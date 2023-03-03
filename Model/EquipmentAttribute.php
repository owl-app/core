<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Category\Model\CategoryInterface as BaseCategoryInterface;
use Owl\Component\Equipment\Model\EquipmentAttribute as BaseEquipmentAttribute;

class EquipmentAttribute extends BaseEquipmentAttribute implements EquipmentAttributeInterface
{
    /**
     * @var \Owl\Component\Core\Model\EquipmentCategoryInterface|null
     */
    protected $category;

    public function getCategory(): ?BaseCategoryInterface
    {
        return $this->category;
    }

    public function setCategory(?BaseCategoryInterface $category): void
    {
        $this->category = $category;
    }
}
