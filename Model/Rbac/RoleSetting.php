<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model\Rbac;

class RoleSetting implements RoleSettingInterface
{
    /** @var mixed */
    protected $id;

    /** @var string */
    protected $canonicalName;

    /** @var string */
    protected $theme;

    /** @var RoleInterface */
    protected $role;

    public function __construct() {}

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getCanonicalName(): string
    {
        return $this->canonicalName;
    }

    public function setCanonicalName(?string $canonicalName): void
    {
        $this->canonicalName = $canonicalName;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): void
    {
        $this->theme = $theme;
    }

    public function getRole(): RoleInterface
    {
        return $this->role;
    }

    public function setRole(RoleInterface $role): void
    {
        $this->role = $role;
    }
}
