<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Doctrine\ORM\QueryBuilder;
use Owl\Component\Core\Model\Rbac\RoleInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Owl\Component\Equipment\Model\EquipmentAttributeInterface;

/**
 * @template T of RoleInterface
 *
 * @extends RepositoryInterface<T>
 */
interface RoleRepositoryInterface extends RepositoryInterface
{
    public function findWithoutAdminSystem(): array;
}
