<?php

declare(strict_types=1);

namespace Kkroff\TeamMembers\Hooks;

use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * DataHandler hook for automatic cache clearing when team members are modified
 */
class DataHandlerHook
{
    /**
     * Hook that is called after database operations
     *
     * @param string $status
     * @param string $table
     * @param string|int $id
     * @param array $fieldArray
     * @param DataHandler $dataHandler
     * @return void
     */
    public function processDatamap_afterDatabaseOperations(
        string $status,
        string $table,
        $id,
        array $fieldArray,
        DataHandler $dataHandler
    ): void {
        // Clear cache when team members are modified
        if ($table === 'tx_teammembers_domain_model_member') {
            $this->clearTeamMembersCaches((int)$id);
        }
    }

    /**
     * Hook that is called after record deletion
     *
     * @param string $table
     * @param int $id
     * @param array $recordToDelete
     * @param bool $recordWasDeleted
     * @param DataHandler $dataHandler
     * @return void
     */
    public function processCmdmap_deleteAction(
        string $table,
        int $id,
        array $recordToDelete,
        bool $recordWasDeleted,
        DataHandler $dataHandler
    ): void {
        // Clear cache when team members are deleted
        if ($table === 'tx_teammembers_domain_model_member' && $recordWasDeleted) {
            $this->clearTeamMembersCaches($id);
        }
    }

    /**
     * Clear caches related to team members
     *
     * @param int $memberId
     * @return void
     */
    protected function clearTeamMembersCaches(int $memberId): void
    {
        $cacheManager = GeneralUtility::makeInstance(CacheManager::class);
        
        // Clear page cache with team members tags
        $cacheTags = [
            'tx_teammembers',
            'tx_teammembers_' . $memberId,
        ];
        
        $cacheManager->flushCachesInGroupByTags('pages', $cacheTags);
    }
}
