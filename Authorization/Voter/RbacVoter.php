<?php

namespace Owl\Component\Core\Authorization\Voter;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

class RbacVoter extends Voter
{
    public function __construct(
        private RouterInterface $router,
        private AdminUserContextInterface $adminUserContext
    ) {}

    protected function supports(string $attribute, $subject): bool
    {
        if(!empty($attribute) && !is_null($this->router->getRouteCollection()->get($attribute))) {
            return true;
        }

        return false;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): int
    {
        $user = $this->adminUserContext->getUser();

        if($user && in_array($attribute, $user->getPermissions())) {
            return VoterInterface::ACCESS_GRANTED;
        }

        return VoterInterface::ACCESS_ABSTAIN;
    }
}
