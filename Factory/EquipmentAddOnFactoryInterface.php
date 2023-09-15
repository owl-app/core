<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\EquipmentAddOnInterface;
use Owl\Component\Core\Model\EquipmentInterface;
use Owl\Component\User\Model\UserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * @template T of EquipmentAddOnInterface
 *
 * @extends FactoryInterface<T>
 */
interface EquipmentAddOnFactoryInterface extends FactoryInterface
{
    public function createForSubject(EquipmentInterface $equipment): EquipmentAddOnInterface;

    public function createForSubjectWithOwner(EquipmentInterface $equipment, ?UserInterface $owner): EquipmentAddOnInterface;
}
