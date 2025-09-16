<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

return [
    'tx-teammembers-plugin' => [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:team_members/Resources/Public/Icons/team_members.svg',
    ],
];
