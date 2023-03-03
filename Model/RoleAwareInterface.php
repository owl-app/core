<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Rbac\Model\RoleAwareInterface as BaseRoleAwareInterface;

interface RoleAwareInterface extends BaseRoleAwareInterface {

    public const ROLE_ADMIN_SYSTEM_NAME = 'ROLE_ADMIN_SYSTEM';

    public const ROLE_ADMIN_COMPANY_NAME = 'ROLE_ADMIN_COMPANY';

    public const ROLE_USER_NAME = 'ROLE_USER';

}
