<?php

declare(strict_types=1);

namespace Goldland\Events\Domain\Model;


/**
 * This file is part of the "Events" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * Speaker
 */
class Speaker extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * position
     *
     * @var string
     */
    protected $position = '';

    /**
     * address
     *
     * @var string
     */
    protected $address = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * tel
     *
     * @var int
     */
    protected $tel = '';

    /**
     * social
     *
     * @var string
     */
    protected $social = '';

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the position
     *
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param string $position
     * @return void
     */
    public function setPosition(string $position)
    {
        $this->position = $position;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the tel
     *
     * @return int $tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Sets the tel
     *
     * @param int $tel
     * @return void
     */
    public function setTel(string $tel)
    {
        $this->tel = $tel;
    }

    /**
     * Returns the social
     *
     * @return string $social
     */
    public function getSocial()
    {
        return $this->social;
    }

    /**
     * Sets the social
     *
     * @param string $social
     * @return void
     */
    public function setSocial(string $social)
    {
        $this->social = $social;
    }

}
