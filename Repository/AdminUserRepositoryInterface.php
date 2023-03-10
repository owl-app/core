<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Doctrine\ORM\QueryBuilder;

interface AdminUserRepositoryInterface extends RepositoryInterface
{
    public function findByCompany($companyId): QueryBuilder;

    public function findAdminsCompany($companyId): array;
}
