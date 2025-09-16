<?php
namespace Kkroff\TeamMembers\Flex;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

final class ItemsProcFunc
{
    public function getMembers(array &$config): void
    {
        $qb = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_teammembers_domain_model_member');

        $rows = $qb->select('uid', 'name')
            ->from('tx_teammembers_domain_model_member')
            ->where(
                $qb->expr()->eq('deleted', 0),
                $qb->expr()->eq('hidden', 0)
            )
            ->orderBy('name', 'ASC')
            ->executeQuery()
            ->fetchAllAssociative();

        $config['items'] = [];
        foreach ($rows as $r) {
            $config['items'][] = [$r['name'], (int)$r['uid']];
        }
    }
}
