<?php

declare(strict_types=1);

namespace Owl\Component\Core\Authorization\Owner\Condition;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Sylius\Component\Grid\Data\ExpressionBuilderInterface;
use Owl\Component\Core\Model\Authorization\OwnerableCompanyInterface;
use Owl\Component\Core\Checker\AdminUserRoleCheckerInterface;

final class UserOwnerCondition implements OwnerConditionInterface
{
    private AdminUserContextInterface $adminUserContext;

    public function __construct(AdminUserContextInterface $adminUserContext)
    {
        $this->adminUserContext = $adminUserContext;
    }

    public function supports(string $model): bool
    {
        if(is_subclass_of($model, OwnerableCompanyInterface::class) && $this->adminUserContext->isUser()) {
            return true;
        }

        return false;
    }

    public function getExpression(ExpressionBuilderInterface $expressionBuilder)
    {
        return $expressionBuilder->equals('user', $this->adminUserContext->getUser());
    }

    public function getCriteria()
    {
        return ['user' => $this->adminUserContext->getUser()->getId()];
    }
}
