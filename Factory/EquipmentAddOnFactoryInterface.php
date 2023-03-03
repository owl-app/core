<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\EquipmentInterface;
use Owl\Component\Core\Model\EquipmentAddOnInterface;
use Owl\Component\Status\Model\OwnerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface EquipmentAddOnFactoryInterface extends FactoryInterface
{
    public function createForSubject(EquipmentInterface $equipment): EquipmentAddOnInterface;

    public function createForSubjectWithOwner(EquipmentInterface $equipment, ?OwnerInterface $owner): EquipmentAddOnInterface;
}
