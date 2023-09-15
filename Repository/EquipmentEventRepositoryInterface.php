<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Doctrine\ORM\QueryBuilder;
use Owl\Component\Core\Model\EquipmentEventInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @template T of EquipmentEventInterface
 *
 * @extends RepositoryInterface<T>
 */
interface EquipmentEventRepositoryInterface extends RepositoryInterface
{
    public function findForEquipment(string $equipmentId): QueryBuilder;

    public function findWaitingToSend(): array;
}
