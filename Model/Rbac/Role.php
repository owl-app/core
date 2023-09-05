<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model\Rbac;

use Owl\Component\Rbac\Model\Role as BaseRole;

class Role extends BaseRole implements RoleInterface
{
    /**
     * @var RoleSettingInterface
     */
    protected $setting;

    /**
     * @return string
     *
     * @psalm-return 'role'
     */
    public function getType(): string
    {
        return 'role';
    }

    /**
     * @return RoleSettingInterface
     */
    public function getSetting(): ?RoleSettingInterface
    {
        return $this->setting;
    }

    public function setSetting(?RoleSettingInterface $setting): void
    {
        $setting->setRole($this);
        $this->setting = $setting;
    }
}
