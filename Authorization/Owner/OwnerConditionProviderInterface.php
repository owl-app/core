<?php

declare(strict_types=1);

namespace Owl\Component\Core\Authorization\Owner;

use Owl\Component\Core\Authorization\Owner\Condition\OwnerConditionInterface;

interface OwnerConditionProviderInterface
{
    public function provide(string $model): ?OwnerConditionInterface;
}

