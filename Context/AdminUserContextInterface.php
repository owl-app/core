<?php

declare(strict_types=1);

namespace Owl\Component\Core\Context;

use Owl\Component\Core\Model\AdminUserInterface;
use Owl\Component\Core\Model\CompanyInterface;

interface AdminUserContextInterface
{
    public function getUser(): ?AdminUserInterface;

    public function getAccessCompany(): ?CompanyInterface;

    public function getRoleCanonicalName(): ?string;

    public function getTheme(): ?string;

    public function isAdminSystem(): bool;

    public function isAdminCompany(): bool;

    public function isUser(): bool;
}
