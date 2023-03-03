<?php

declare(strict_types=1);

namespace Owl\Component\Core\Authorization\Owner;

use Laminas\Stdlib\PriorityQueue;
use Owl\Component\Core\Authorization\Owner\Condition\OwnerConditionInterface;
use Owl\Component\Core\Context\AdminUserContextInterface;

final class CompositeOwnerConditionProvider implements OwnerConditionProviderInterface
{
    /**
     * @var PriorityQueue|OwnerConditionInterface[]
     *
     * @psalm-var PriorityQueue<OwnerConditionInterface>
     */
    private $ownerConditions;

    public function __construct()
    {
        $this->ownerConditions = new PriorityQueue;
    }

    public function addCondition(OwnerConditionInterface $ownerCondition, int $priority = 0): void
    {
        $this->ownerConditions->insert($ownerCondition, $priority);
    }

    public function provide(string $model): ?OwnerConditionInterface
    {
        foreach($this->ownerConditions as $ownerCondition)
        {
            if($ownerCondition->supports($model)) {
                return $ownerCondition;
            }
        }

        return null;
    }
}
