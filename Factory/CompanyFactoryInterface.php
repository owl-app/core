<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\AdminUserInterface;
use Owl\Component\Core\Model\CompanyInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface CompanyFactoryInterface extends FactoryInterface
{
    public function createAction(AdminUserInterface $owner): CompanyInterface;
}
