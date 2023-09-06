<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Owl\Component\Core\Model\EquipmentInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @template T of EquipmentInterface
 *
 * @extends RepositoryInterface<T>
 */
interface EquipmentRepositoryInterface extends RepositoryInterface
{
}
