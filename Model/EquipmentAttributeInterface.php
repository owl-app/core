<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Category\Model\CategorizableInterface;
use Owl\Component\Equipment\Model\EquipmentAttributeInterface as BaseEquipmentAttributeInterface;

interface EquipmentAttributeInterface extends
    BaseEquipmentAttributeInterface,
    CategorizableInterface
{

}