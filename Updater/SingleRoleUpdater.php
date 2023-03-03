<?php
declare(strict_types=1);

namespace Owl\Component\Core\Updater;

use Owl\Bundle\RbacManagerBundle\Factory\ItemFactoryInterface;
use Owl\Bundle\RbacManagerBundle\Manager\ManagerInterface;
use Owl\Component\Core\Model\AdminUserInterface;
use Owl\Bundle\RbacManagerBundle\Types\Item;

final class SingleRoleUpdater implements SingleRoleUpdaterInterface
{
    public function __construct(
        private ManagerInterface $rbacManager,
        private ItemFactoryInterface $rbacItemFactory
    ) {
    }

    public function assign(AdminUserInterface $user): void
    {
        $assignItem = $this->rbacItemFactory->create(Item::TYPE_ROLE, $user->getRole()->getName());
        $rolesUser = $this->rbacManager->getRolesByUser($user->getId());
 
        try {
            $this->deleteAssignedRoles($rolesUser, $user->getId());
            $this->rbacManager->assign($assignItem, $user->getId());
        } catch (\Exception $e) {
            throw $e;
        }
    }

    private function deleteAssignedRoles(array $roles, int $userId): void
    {
        if ($roles) {
            foreach ($roles as $role) {
                $this->rbacManager->revoke($role, $userId);
            }
        }
    }
}
