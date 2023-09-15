<?php

declare(strict_types=1);

namespace Owl\Component\Core\Provider;

interface EquipmentCategoryCodeProviderInterface
{
    public function getCode(int $id): ?string;
}
