<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model\Authorization;

use Owl\Component\Company\Model\CompanyInterface as BaseCompanyInterface;

interface OwnerableCompanyInterface {

    public function getCompany(): ?BaseCompanyInterface;

}
