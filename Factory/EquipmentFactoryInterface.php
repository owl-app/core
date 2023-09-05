<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Sylius\Component\Resource\Factory\FactoryInterface;
use Owl\Component\Core\Model\EquipmentInterface;

/**
 * @template T of EquipmentInterface
 *
 * @extends FactoryInterface<T>
 */
interface EquipmentFactoryInterface extends FactoryInterface
{
    public function createNew(): EquipmentInterface;
}
