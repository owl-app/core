<?php

declare(strict_types=1);

namespace Owl\Component\Core\Authorization\Owner\Condition;

use Sylius\Component\Grid\Data\ExpressionBuilderInterface;

interface OwnerConditionInterface
{
    public function supports(string $model): bool;

    public function getExpression(ExpressionBuilderInterface $expressionBuilder);

    public function getCriteria();
}
