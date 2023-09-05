<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Owl\Component\Core\Model\EquipmentInterface;

/**
 * @template T of EquipmentInterface
 *
 * @implements EquipmentFactoryInterface<T>
 */
final class EquipmentFactory implements EquipmentFactoryInterface
{
    public function __construct(
        private FactoryInterface $defaultFactory,
        private AdminUserContextInterface $adminUserContext
    ) {
    }

    public function createNew(): EquipmentInterface
    {
        $equipment =  $this->defaultFactory->createNew();

        if($this->adminUserContext->isUser()) {
            $equipment->setPrice(0);
        }

        return $equipment;
    }
}
