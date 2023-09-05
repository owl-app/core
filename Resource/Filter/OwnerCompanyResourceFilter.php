<?php

declare(strict_types=1);

namespace Owl\Component\Core\Resource\Filter;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Owl\Bridge\SyliusResource\Doctrine\Orm\Filter\FilterInterface;
use Doctrine\ORM\QueryBuilder;
use Owl\Component\Core\Model\Authorization\ManyOwnerableCompanyInterface;
use Sylius\Bundle\GridBundle\Doctrine\ORM\ExpressionBuilder;
use Owl\Component\Core\Model\Authorization\OwnerableCompanyInterface;

final class OwnerCompanyResourceFilter implements FilterInterface
{
    public function __construct(private AdminUserContextInterface $adminUserContext)
    {
    }

    public function support(string $resourceClass, string $action): bool
    {
        if (
            is_subclass_of($resourceClass, OwnerableCompanyInterface::class) && $this->adminUserContext->isAdminCompany() &&
            !is_subclass_of($resourceClass, ManyOwnerableCompanyInterface::class)
        ) {
            return true;
        }

        return false;
    }

    public function apply(QueryBuilder $queryBuilder, string $model): void
    {
        $expressionBuilder = new ExpressionBuilder($queryBuilder);

        $queryBuilder->andWhere(
            $expressionBuilder->in('company', $this->adminUserContext->getAccessCompaniesIds())
        );
    }
}
