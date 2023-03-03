<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Category\Model\CategorizableInterface;
use Owl\Component\Company\Model\CompanyAwareInterface;
use Owl\Component\Core\Model\Authorization\OwnerableCompanyInterface;
use Owl\Component\Core\Model\Authorization\OwnerableUserInterface;
use Owl\Component\Equipment\Model\EquipmentInterface as BaseEquipmentInterface;
use Owl\Component\File\Model\FileableInterface;
use Owl\Component\User\Model\UserAwareInterface;

interface EquipmentInterface extends
    BaseEquipmentInterface,
    CompanyAwareInterface,
    UserAwareInterface,
    FileableInterface,
    CategorizableInterface,
    OwnerableCompanyInterface,
    OwnerableUserInterface
{
    public function getFullname(): string;
}