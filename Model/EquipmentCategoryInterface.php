<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Category\Model\CategoryInterface as BaseCategoryInterface;

interface EquipmentCategoryInterface extends
    BaseCategoryInterface
{
    public const TRANSPORT_ID = 17;

    public const CODES = [
        self::TRANSPORT_ID => 'transport'
    ];
}