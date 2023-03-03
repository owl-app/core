<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Company\Model\CompanyInterface as BaseCompanyInterface;
use Owl\Component\User\Model\UserInterface as BaseUserInterface;

interface CompanyInterface extends BaseCompanyInterface
{
    public function setOwner(BaseUserInterface $owner): void;
}