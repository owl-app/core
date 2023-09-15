<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Doctrine\ORM\QueryBuilder;
use Owl\Component\Core\Model\EquipmentRefuelingInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @template T of EquipmentRefuelingInterface
 *
 * @extends RepositoryInterface<T>
 */
interface EquipmentRefuelingRepositoryInterface extends RepositoryInterface
{
    public function findForEquipment(string $equipmentId): QueryBuilder;
}
