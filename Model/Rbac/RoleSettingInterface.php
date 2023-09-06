<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model\Rbac;

use Sylius\Component\Resource\Model\ResourceInterface;

interface RoleSettingInterface extends ResourceInterface
{
    public function getCanonicalName(): string;

    public function setCanonicalName(string $canonicalName): void;

    public function getTheme(): string;

    public function setTheme(string $theme): void;

    public function getRole(): RoleInterface;

    public function setRole(RoleInterface $role): void;
}
