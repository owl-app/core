<?php

declare(strict_types=1);

namespace Owl\Component\Core\Factory;

use Owl\Component\Core\Model\AdminUserInterface;
use Owl\Component\Core\Model\CompanyInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * @template T of CompanyInterface
 *
 * @implements CompanyFactoryInterface<T>
 */
final class CompanyFactory implements CompanyFactoryInterface
{
    private FactoryInterface $defaultFactory;

    public function __construct(FactoryInterface $defaultFactory)
    {
        $this->defaultFactory = $defaultFactory;
    }

    public function createNew(): CompanyInterface
    {
        return $this->defaultFactory->createNew();
    }

    public function createAction(AdminUserInterface $owner): CompanyInterface
    {
        /** @var CompanyInterface $company */
        $company = $this->defaultFactory->createNew();
        $company->setOwner($owner);

        return $company;
    }
}
