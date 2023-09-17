<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Category\Model\Category as BaseCategory;

class EquipmentCategory extends BaseCategory implements EquipmentCategoryInterface
{
    /** @var array */
    protected $addons;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAddons(): array
    {
        return $this->addons;
    }

    public function setAddons(array $addons): void
    {
        $this->addons = $addons;
    }
}
