<?php

declare(strict_types=1);

namespace Owl\Component\Core\Resource\Filter;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Owl\Bridge\SyliusResource\Doctrine\Orm\Filter\FilterInterface;
use Doctrine\Orm\QueryBuilder;
use Owl\Component\Core\Model\Authorization\ManyOwnerableCompanyInterface;
use Sylius\Bundle\GridBundle\Doctrine\ORM\ExpressionBuilder;

final class OwnerManyCompanyResourceFilter implements FilterInterface
{
    public function __construct(AdminUserContextInterface $adminUserContext)
    {
        $this->adminUserContext = $adminUserContext;
    }

    public function support(string $resourceClass, string $action): bool
    {
        if(is_subclass_of($resourceClass, ManyOwnerableCompanyInterface::class) && $this->adminUserContext->isAdminCompany()) {
            return true;
        }

        return false;
    }

    public function apply(QueryBuilder $queryBuilder, string $model): void
    {
        $expressionBuilder = new ExpressionBuilder($queryBuilder);

        $queryBuilder->andWhere(
            $expressionBuilder->in('companies.id', $this->adminUserContext->getAccessCompaniesIds())
        );
    }
}
