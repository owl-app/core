<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface EquipmentRefuelingRepositoryInterface extends RepositoryInterface
{
    public function findForEquipment(string $equipmentId): QueryBuilder;
}
