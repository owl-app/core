<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Equipment\Model\EquipmentInterface as BaseEquipmentnterface;

interface EquipmentAddOnInterface {
    public const ADDON_REFUELING_NAME = 'owl.ui.equipment_addon.refueling_name';

    public const ADDON_EVENT_NAME = 'owl.ui.equipment_addon.event_name';

    public const ADDON_REFUELING_CODE = 'refueling';

    public const ADDON_EVENT_CODE = 'event';

    public function getEquipment(): ?BaseEquipmentnterface;

    public function setEquipment(?BaseEquipmentnterface $equipment): void;
}