<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Owl\Component\Category\Model\Category as BaseCategory;

class EquipmentCategory extends BaseCategory implements EquipmentCategoryInterface
{
    /**
     * @var Collection|EquipmentInterface[]
     *
     * @psalm-var Collection<array-key, EquipmentInterface>
     */
    protected $equipments;

    /**
     * @var array $addons
     */
    protected $addons;

    public function __construct()
    {
        parent::__construct();

        /** @var ArrayCollection<array-key, EquipmentInterface> $this->equipments */
        $this->equipments = new ArrayCollection();
    }

    /**
     * @psalm-return Collection<array-key, EquipmentInterface>
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
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
