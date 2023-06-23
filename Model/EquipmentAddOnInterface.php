<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Category\Model\CategoryInterface as BaseCategoryInterface;

interface EquipmentAddOnInterface {
    public const ADDON_REFUELING_NAME = 'owl.ui.equipment_addon.refueling_name';

    public const ADDON_EVENT_NAME = 'owl.ui.equipment_addon.event_name';

    public const ADDON_REFUELING_CODE = 'refueling';

    public const ADDON_EVENT_CODE = 'event';
}