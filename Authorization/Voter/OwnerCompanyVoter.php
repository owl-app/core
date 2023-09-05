<?php

namespace Owl\Component\Core\Authorization\Voter;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Owl\Component\Core\Model\Authorization\OwnerableCompanyInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

final class OwnerCompanyVoter extends Voter
{
    private AdminUserContextInterface $adminUserContext;

    public function __construct(AdminUserContextInterface $adminUserContext)
    {
        $this->adminUserContext = $adminUserContext;
    }

    protected function supports(string $attribute, $subject): bool
    {
        if($subject instanceof OwnerableCompanyInterface && $this->adminUserContext->isAdminCompany()) {
            return true;
        }

        return false;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): int
    {
        if($subject->getCompany()->getId() === $this->adminUserContext->getAccessCompany()->getId())
            return VoterInterface::ACCESS_GRANTED;

        return VoterInterface::ACCESS_ABSTAIN;
    }
}
