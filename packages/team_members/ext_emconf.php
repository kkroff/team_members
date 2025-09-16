<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Team Members',
    'description' => 'TYPO3 extension for managing team members with clean architecture and modern best practices',
    'category' => 'plugin',
    'author' => 'Kkroff',
    'author_email' => '',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'extbase' => '13.4.0-13.4.99',
            'fluid' => '13.4.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
