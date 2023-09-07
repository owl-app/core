<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\EquipmentInterface;
use Owl\Component\Core\Model\EquipmentAddOnInterface;
use Owl\Component\User\Model\UserAwareInterface;
use Owl\Component\User\Model\UserInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * @template T of EquipmentAddOnInterface
 *
 * @implements EquipmentAddOnFactoryInterface<T>
 */
final class EquipmentAddOnFactory implements EquipmentAddOnFactoryInterface
{
    /** @var FactoryInterface */
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNew(): EquipmentAddOnInterface
    {
        return $this->factory->createNew();
    }

    public function createForSubject(EquipmentInterface $equipment): EquipmentAddOnInterface
    {
        /** @var EquipmentAddOnInterface $refueling */
        $refueling = $this->factory->createNew();
        $refueling->setEquipment($equipment);

        return $refueling;
    }

    public function createForSubjectWithOwner(EquipmentInterface $equipment, ?UserInterface $owner): EquipmentAddOnInterface
    {
        /** @var EquipmentAddOnInterface & UserAwareInterface $refueling */
        $refueling = $this->createForSubject($equipment);
        $refueling->setUser($owner);

        return $refueling;
    }
}
