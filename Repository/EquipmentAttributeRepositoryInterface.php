<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Doctrine\ORM\QueryBuilder;
use Owl\Component\Equipment\Model\EquipmentAttributeInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @template T of EquipmentAttributeInterface
 *
 * @extends RepositoryInterface<T>
 */
interface EquipmentAttributeRepositoryInterface extends RepositoryInterface
{
    public function findByCategory($categoryId): QueryBuilder;
}
