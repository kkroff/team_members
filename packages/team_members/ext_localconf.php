<?php

defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    teammembers_list {
                        iconIdentifier = team-members-plugin
                        title = LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member
                        description = LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.description
                        tt_content_defValues {
                            CType = list
                            list_type = teammembers_list
                        }
                    }
                }
                show = *
            }
        }'
    );
})();
