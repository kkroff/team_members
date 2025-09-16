<?php

declare(strict_types=1);

namespace Kkroff\TeamMembers\Controller;

use Kkroff\TeamMembers\Domain\Repository\MemberRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * MemberController
 */
class MemberController extends ActionController
{
    /**
     * @var MemberRepository
     */
    protected MemberRepository $memberRepository;

    /**
     * Constructor
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * List action - displays all or selected team members in custom order
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $mode = (string)($this->settings['mode'] ?? 'all');
        $selected = GeneralUtility::intExplode(',', $this->settings['members'] ?? '', true);

        if ($mode === 'all') {
            $members = $this->memberRepository->findAll()->toArray();
        } else {
            if ($selected === []) {
                $members = [];
            } else {
                $memberByUids = $this->memberRepository->findByUids($selected)->toArray();
                $map = [];
                foreach ($memberByUids as $loopMember) {
                    $map[$loopMember->getUid()] = $loopMember;
                }
                $members = [];
                foreach ($selected as $uid) {
                    if (isset($map[$uid])) {
                        $members[] = $map[$uid];
                    }
                }
            }
        }

        $this->view->assign('members', $members);
        return $this->htmlResponse();
    }
}
