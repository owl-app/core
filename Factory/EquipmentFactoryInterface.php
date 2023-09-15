<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\EquipmentInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * @template T of EquipmentInterface
 *
 * @extends FactoryInterface<T>
 */
interface EquipmentFactoryInterface extends FactoryInterface
{
    public function createNew(): EquipmentInterface;
}
