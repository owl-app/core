<?php

declare(strict_types=1);

namespace Owl\Component\Core\Checker;

use Owl\Component\Core\Model\EquipmentCategoryInterface;

interface EquipmentCategoryCheckerInterface
{
    public function getTransportId(): int;

    public function isTransport(?EquipmentCategoryInterface $category): bool;
}
