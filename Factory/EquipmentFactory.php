<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Context\AdminUserContextInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class EquipmentFactory implements EquipmentFactoryInterface
{
    public function __construct(
        private FactoryInterface $defaultFactory,
        private AdminUserContextInterface $adminUserContext
    ) {
    }

    public function createNew()
    {
        $equipment =  $this->defaultFactory->createNew();

        if($this->adminUserContext->isUser()) {
            $equipment->setPrice(0);
        }

        return $equipment;
    }
}
