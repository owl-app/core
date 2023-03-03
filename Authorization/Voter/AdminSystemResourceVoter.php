<?php

namespace Owl\Component\Core\Authorization\Voter;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

final class AdminSystemResourceVoter extends Voter
{
    private AdminUserContextInterface $adminUserContext;

    public function __construct(AdminUserContextInterface $adminUserContext)
    {
        $this->adminUserContext = $adminUserContext;
    }

    protected function supports(string $attribute, $subject): bool
    {
        if($subject instanceof ResourceInterface && $this->adminUserContext->isAdminSystem()) {
            return true;
        }

        return false;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        return VoterInterface::ACCESS_GRANTED;
    }
}
