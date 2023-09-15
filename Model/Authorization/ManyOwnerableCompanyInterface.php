<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model\Authorization;

use Doctrine\Common\Collections\Collection;
use Owl\Component\Company\Model\CompanyInterface;

interface ManyOwnerableCompanyInterface
{
    public function getCompanies(): Collection;

    public function addCompany(CompanyInterface $company): void;

    public function removeCompany(CompanyInterface $company): void;

    public function hasCompany(CompanyInterface $company): bool;
}
