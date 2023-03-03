<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\EquipmentInterface;
use Owl\Component\Core\Model\EquipmentAddOnInterface;
use Owl\Component\Status\Model\OwnerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

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

    public function createForSubjectWithOwner(EquipmentInterface $equipment, ?OwnerInterface $owner): EquipmentAddOnInterface
    {
        /** @var EquipmentAddOnInterface $refueling */
        $refueling = $this->createForSubject($equipment);
        $refueling->setUser($owner);

        return $refueling;
    }
}
