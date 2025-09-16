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
     * List action - displays selected team members in custom order
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $members = $this->memberRepository->findAll();
        //$this->setCacheTags($memberUids);

        $this->view->assignMultiple([
            'members' => $members,
            'settings' => $this->settings,
        ]);
        return $this->htmlResponse();
    }

    /**
     * Set cache tags for automatic cache clearing
     *
     * @param array $memberUids
     * @return void
     */
    protected function setCacheTags(array $memberUids): void
    {
        $cacheTags = ['tx_teammembers'];

        foreach ($memberUids as $uid) {
            $cacheTags[] = 'tx_teammembers_' . $uid;
        }

        if ($this->request->getAttribute('frontend.cache.instruction')) {
            $cacheInstruction = $this->request->getAttribute('frontend.cache.instruction');
            $cacheInstruction->addCacheTags($cacheTags);
        }
    }
}
