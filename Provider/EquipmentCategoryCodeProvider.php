<?php

declare(strict_types=1);

namespace Owl\Component\Core\Provider;

use Owl\Component\Core\Model\EquipmentCategoryInterface;

class EquipmentCategoryCodeProvider implements EquipmentCategoryCodeProviderInterface
{
    /**
     * @return null|string
     *
     * @psalm-return 'transport'|null
     */
    public function getCode(int $id):? string
    {
        return EquipmentCategoryInterface::CODES[$id] ?? null;
    }
}
