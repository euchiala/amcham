<?php

declare(strict_types=1);

namespace Goldland\amchamSitepackage\Controller;

use Evoweb\SfRegister\Controller\Event\CreateConfirmEvent;
use \Evoweb\SfRegister\Controller\Event\CreateFormEvent;
use Evoweb\SfRegister\Controller\Event\CreatePreviewEvent;
use Evoweb\SfRegister\Controller\Event\CreateSaveEvent;
use \Goldland\amchamSitepackage\Domain\Model\FrontendUser;
use Evoweb\SfRegister\Services\Session;
use \Psr\Http\Message\ResponseInterface;
use \TYPO3\CMS\Core\Http\HtmlResponse;
use \Evoweb\SfRegister\Controller\FeuserCreateController;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ExtendFeuserCreateController extends FeuserCreateController
{
    /**
     * frontendUserRepository
     *
     * @var \Goldland\amchamSitepackage\Domain\Repository\FrontendUserRepository
     */
   protected $FrontendUserRepository = null;

    /**
     * @param \Goldland\amchamSitepackage\Domain\Repository\frontendUserRepository $frontendUserRepository
     */
    public function injectCategoryRepository(\Goldland\amchamSitepackage\Domain\Repository\FrontendUserRepository $frontendUserRepository)
    {
       $this->frontendUserRepository = $frontendUserRepository;
    }

    public function formAction(FrontendUser $user = null): ResponseInterface
    {
        $setupResponse = $this->setupCheck();
        if ($user) {
            $this->eventDispatcher->dispatch(new CreateFormEvent($user, $this->settings));
            $this->view->assign('user', $user);
        }

        return $setupResponse ?? new HtmlResponse($this->view->render());
    }



    /**
     * Preview action
     *
     * @param FrontendUser $user
     *
     * @return ResponseInterface
     *
     * @TYPO3\CMS\Extbase\Annotation\Validate("Evoweb\SfRegister\Validation\Validator\UserValidator", param="user")
     */
    public function previewAction(FrontendUser $user): ResponseInterface
    {

        if ($this->request->hasArgument('temporaryImage')) {
            $this->view->assign('temporaryImage', $this->request->getArgument('temporaryImage'));
        }

        $this->eventDispatcher->dispatch(new CreatePreviewEvent($user, $this->settings));

        $this->view->assign('user', $user);

        return new HtmlResponse($this->view->render());
    }

    /**
     * Save action
     *
     * @param FrontendUser $user
     *
     * @return ResponseInterface
     *
     * @TYPO3\CMS\Extbase\Annotation\Validate("Evoweb\SfRegister\Validation\Validator\UserValidator", param="user")
     */
    public function saveAction(FrontendUser $user): ResponseInterface
    {

        if ($this->settings['confirmEmailPostCreate'] || $this->settings['acceptEmailPostCreate']) {
            $user->setDisable(true);
            $user = $this->changeUsergroup($user, (int)$this->settings['usergroupPostSave']);
        } else {
            $user = $this->changeUsergroup($user, (int)$this->settings['usergroup']);
            $this->moveTemporaryImage($user);
        }

        if ($this->settings['useEmailAddressAsUsername']) {
            $user->setUsername($user->getEmail());
        }


        $this->eventDispatcher->dispatch(new CreateSaveEvent($user, $this->settings));

        // Persist user to get valid uid
        $plainPassword = $user->getPassword();
        // Avoid plain password being persisted
        $user->setPassword('');

        if($user->getFirmaField()){
            $user->setFirmaField($user->getFirmaField());
        }

        $this->userRepository->add($user);
        $this->persistAll();

        // Write back plain password
        $user->setPassword($plainPassword);
        $user = $this->sendEmails($user, __FUNCTION__);

        // Encrypt plain password
        if ($user->getPassword()) {
            $user->setPassword($this->encryptPassword($user->getPassword()));
        }
        $this->userRepository->update($user);
        $this->persistAll();

        /** @var \Evoweb\SfRegister\Services\Session $session */
        $session = GeneralUtility::makeInstance(Session::class);
        $session->remove('captchaWasValidPreviously');

        if ($this->settings['autologinPostRegistration']) {
            $this->autoLogin($user, (int)$this->settings['redirectPostRegistrationPageId']);
        }

        if ($this->settings['redirectPostRegistrationPageId']) {
            $this->redirectToPage((int)$this->settings['redirectPostRegistrationPageId']);
        }

        $this->view->assign('user', $user);

        return new HtmlResponse($this->view->render());
    }


    /**
     * Confirm registration process by user
     * Could be followed by acceptance of admin
     *
     * @param \Goldland\amchamSitepackage\Domain\Model\FrontendUser  $user
     * @param ?string $hash
     *
     * @return ResponseInterface
     */
    public function confirmAction( $user, ?string $hash): ResponseInterface
    {
        $user = $this->determineFrontendUser($user, $hash);
        if (!($user instanceof FrontendUser)) {
            $this->view->assign('userNotFound', 1);
        } else {
            $this->view->assign('user', $user);

            if (
                $user->getActivatedOn() || $this->isUserInUserGroups(
                    $user,
                    $this->getConfiguredUserGroups((int)$this->settings['usergroupPostConfirm'])
                )
            ) {
                $this->view->assign('userAlreadyConfirmed', 1);
            } else {
                $user = $this->changeUsergroup($user, (int)$this->settings['usergroupPostConfirm']);
                $this->moveTemporaryImage($user);
                $user->setActivatedOn(new \DateTime('now'));

                if ($this->settings['acceptEmailPostConfirm']) {
                    $user->setDisable(false);
                }

                $this->eventDispatcher->dispatch(new CreateConfirmEvent($user, $this->settings));

                $this->userRepository->update($user);

                $this->sendEmails($user, __FUNCTION__);

                if ($this->settings['autologinPostConfirmation']) {
                    $this->persistAll();
                    $this->autoLogin($user, (int)$this->settings['redirectPostActivationPageId']);
                }

                if ($this->settings['redirectPostActivationPageId']) {
                    $this->redirectToPage((int)$this->settings['redirectPostActivationPageId']);
                }

                $this->view->assign('userConfirmed', 1);
            }
        }

        return new HtmlResponse($this->view->render());
    }


}
