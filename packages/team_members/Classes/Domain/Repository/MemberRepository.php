<?php

declare(strict_types=1);

namespace Kkroff\TeamMembers\Domain\Repository;

use Kkroff\TeamMembers\Domain\Model\Member;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * The repository for Members
 */
class MemberRepository extends Repository
{
    /**
     * Find all members ordered by name
     *
     * @return QueryResultInterface
     */
    public function findAllOrderedByName(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->setOrderings(['name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        
        return $query->execute();
    }

    /**
     * Find members by department
     *
     * @param string $department
     * @return QueryResultInterface
     */
    public function findByDepartment(string $department): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('department', $department));
        $query->setOrderings(['name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        
        return $query->execute();
    }

    /**
     * Find members by role
     *
     * @param string $role
     * @return QueryResultInterface
     */
    public function findByRole(string $role): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching($query->equals('role', $role));
        $query->setOrderings(['name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        
        return $query->execute();
    }

    /**
     * Search members by name or role
     *
     * @param string $searchTerm
     * @return QueryResultInterface
     */
    public function searchByNameOrRole(string $searchTerm): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalOr([
                $query->like('name', '%' . $searchTerm . '%'),
                $query->like('role', '%' . $searchTerm . '%')
            ])
        );
        $query->setOrderings(['name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING]);
        
        return $query->execute();
    }
}
