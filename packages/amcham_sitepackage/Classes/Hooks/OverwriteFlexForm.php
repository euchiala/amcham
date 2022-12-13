<?php
declare(strict_types=1);
namespace Goldland\AmchamSitepackage\Hooks;

/**
 * Class OverwriteFlexForm
 */
class OverwriteFlexForm
{

    /**
     * @var string
     */
    protected $path = 'FILE:EXT:amcham_sitepackage/Configuration/FlexForms/PluginCustomList.xml';

    /**
     * @return void
     */
    public function overwrite()
    {
        $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['powermail_pi1,list']
            = $this->path;
    }
}