<?php

declare(strict_types=1);

namespace Owl\Component\Core\Checker;

use Owl\Component\Core\Model\EquipmentCategoryInterface;

final class EquipmentCategoryChecker implements EquipmentCategoryCheckerInterface
{
    /**
     * @return int
     *
     * @psalm-return 17
     */
    public function getTransportId(): int
    {
        return EquipmentCategoryInterface::TRANSPORT_ID;
    }

    public function isTransport(?EquipmentCategoryInterface $category): bool
    {
        return $category && $category->getId() === EquipmentCategoryInterface::TRANSPORT_ID;
    }
}
