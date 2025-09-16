<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member',
        'label' => 'name',
        'label_alt' => 'role',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'sortby' => 'sorting',
        'searchFields' => 'name,role,department,description',
        'typeicon_classes' => [
            'default' => 'tx-teammembers-plugin',
        ],
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    name, role, department, photo, description,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
            ',
        ],
    ],
    'palettes' => [
        'hidden' => [
            'showitem' => '
                hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden
            ',
        ],
        'access' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access',
            'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel
            ',
        ],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim,required',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'role' => [
            'exclude' => false,
            'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.role',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
                'eval' => 'trim,required',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'department' => [
            'exclude' => false,
            'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.department',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.department.development',
                        'value' => 'development',
                    ],
                    [
                        'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.department.design',
                        'value' => 'design',
                    ],
                    [
                        'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.department.projectmanagement',
                        'value' => 'projectmanagement',
                    ],
                    [
                        'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.department.sales',
                        'value' => 'sales',
                    ],
                    [
                        'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.department.support',
                        'value' => 'support',
                    ],
                ],
                'default' => 'development',
                'required' => true,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
        'photo' => [
            'exclude' => false,
            'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.photo',
            'config' => [
                'type' => 'file',
                'allowed' => 'common-image-types',
                'maxitems' => 1,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                ],
                'overrideChildTca' => [
                    'columns' => [
                        'uid_local' => [
                            'config' => [
                                'appearance' => [
                                    'elementBrowserType' => 'file',
                                    'elementBrowserAllowed' => 'gif,jpg,jpeg,tif,tiff,bmp,pcx,tga,png,pdf,ai,svg',
                                ],
                            ],
                        ],
                    ],
                    'types' => [
                        '0' => [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette
                            ',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette
                            ',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette
                            ',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                                --palette--;;audioOverlayPalette,
                                --palette--;;filePalette
                            ',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                                --palette--;;videoOverlayPalette,
                                --palette--;;filePalette
                            ',
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                                --palette--;;imageoverlayPalette,
                                --palette--;;filePalette
                            ',
                        ],
                    ],
                ],
            ],
        ],
        'description' => [
            'exclude' => false,
            'label' => 'LLL:EXT:team_members/Resources/Private/Language/locallang_db.xlf:tx_teammembers_domain_model_member.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ],
        ],
    ],
];
