<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Owl\Component\Equipment\Model\EquipmentAttributeInterface;

/**
 * @template T of EquipmentAttributeInterface
 *
 * @extends RepositoryInterface<T>
 */
interface EquipmentAttributeRepositoryInterface extends RepositoryInterface
{
}
