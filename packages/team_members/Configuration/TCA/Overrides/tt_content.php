<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();


(static function (): void {
    $pluginKey = ExtensionUtility::registerPlugin(
        'TeamMembers',
        'List',
        'LLL:EXT:team_members/Resources/Private/Language/locallang.xlf:plugin.title',
        'tx-teammembers-plugin',
        'plugins',
        'LLL:EXT:team_members/Resources/Private/Language/locallang.xlf:plugin.description',
        'FILE:EXT:team_members/Configuration/FlexForms/PluginSettings.xml',
    );

    ExtensionManagementUtility::addToAllTCAtypes(
        'tt_content',
        '--div--;Configuration,pi_flexform,',
        $pluginKey,
        'after:subheader',
    );

    ExtensionManagementUtility::addPiFlexFormValue(
        '',
        'FILE:EXT:team_members/Configuration/FlexForms/PluginSettings.xml',
        $pluginKey,
    );
})();





