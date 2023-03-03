<?php

declare(strict_types=1);

namespace Owl\Component\Core\Equipment\Menu;

use Owl\Bundle\AdminBundle\Event\EquipmentAddOnMenuEvent;

interface EquipmentAddOnMenuListenerInteface
{
    public function addTabs(EquipmentAddOnMenuEvent $event);

    public function addGridMenu(EquipmentAddOnMenuEvent $event);
}
