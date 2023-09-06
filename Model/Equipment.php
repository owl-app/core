<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Owl\Component\File\Model\FileInterface;
use Owl\Component\User\Model\UserInterface as BaseUserInterface;
use Owl\Component\Company\Model\CompanyInterface as BaseCompanyInterface;
use Owl\Component\Equipment\Model\Equipment as BaseEquipment;
use Owl\Component\Category\Model\CategoryInterface as BaseCategoryInterface;
use Webmozart\Assert\Assert;

class Equipment extends BaseEquipment implements EquipmentInterface
{
    /** @var BaseUserInterface */
    protected $user;

    /** @var BaseCompanyInterface */
    protected $company;

    /**
     * @var Collection|FileInterface[]
     *
     * @psalm-var Collection<array-key, FileInterface>
     */
    protected $files;

    /**
     * @var \Owl\Component\Core\Model\EquipmentCategoryInterface|null
     */
    protected $category;

    /** @var Collection|EquipmentEventInterface[] */
    protected $events;

    /** @var Collection|EquipmentRefuelingInterface[] */
    protected $refuelings;

    public function __construct()
    {
        parent::__construct();

        /** @var ArrayCollection<array-key, FileInterface> $this->files */
        $this->files = new ArrayCollection();

        /** @var ArrayCollection<array-key, EquipmentEventInterface> $this->events */
        $this->events = new ArrayCollection();

        /** @var ArrayCollection<array-key, EquipmentRefuelingInterface> $this->refuelings */
        $this->refuelings = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getFullname(): string
    {
        return $this->name.' - '.$this->symbol;
    }

    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(FileInterface $file): void
    {
        $this->files->add($file);
    }

    public function removeFile(FileInterface $file): void
    {
        $this->files->removeElement($file);
    }

    /**
     * @return BaseUserInterface
     */
    public function getUser(): ?BaseUserInterface
    {
        return $this->user;
    }

    public function setUser(?BaseUserInterface $user): void
    {
        $this->user = $user;
    }

    /**
     * @return BaseCompanyInterface
     */
    public function getCompany(): ?BaseCompanyInterface
    {
        return $this->company;
    }

    public function setCompany(?BaseCompanyInterface $company): void
    {
        $this->company = $company;
    }

    /**
     * @return EquipmentCategoryInterface|null
     */
    public function getCategory(): ?BaseCategoryInterface
    {
        return $this->category;
    }

    public function setCategory(?BaseCategoryInterface $category): void
    {
        $this->category = $category;
    }

    /**
     * @return Collection|EquipmentEventInterface[]
     *
     * @psalm-return Collection|array<EquipmentEventInterface>
     */
    public function getEvents(): array|Collection
    {
        return $this->events;
    }

    public function addEvent(?EquipmentEventInterface $event): void
    {
        /** @var EquipmentEventInterface $event */
        Assert::isInstanceOf(
            $event,
            EquipmentEventInterface::class,
            'Event objects added to a Equipment object have to implement EquipmentEventInterface'
        );

        if (!$this->hasEvent($event)) {
            $event->setEquipment($this);
            $this->events->add($event);
        }
    }

    public function removeEvent(?EquipmentEventInterface $event): void
    {
        /** @var EquipmentEventInterface $event */
        Assert::isInstanceOf(
            $event,
            EquipmentEventInterface::class,
            'Event objects removed from a Equipment object have to implement EquipmentEventInterface'
        );

        if ($this->hasEvent($event)) {
            $this->events->removeElement($event);
        }
    }

    public function hasEvent(EquipmentEventInterface $event): bool
    {
        return $this->events->contains($event);
    }

    /**
     * @return Collection|EquipmentRefuelingInterface[]
     *
     * @psalm-return Collection|array<EquipmentRefuelingInterface>
     */
    public function getRefuelings(): array|Collection
    {
        return $this->refuelings;
    }

    public function addRefueling(?EquipmentRefuelingInterface $refueling): void
    {
        /** @var EquipmentRefuelingInterface $refueling */
        Assert::isInstanceOf(
            $refueling,
            EquipmentRefuelingInterface::class,
            'Refueling objects added to a Equipment object have to implement EquipmentRefuelingInterface'
        );

        if (!$this->hasRefueling($refueling)) {
            $refueling->setEquipment($this);
            $this->refuelings->add($refueling);
        }
    }

    public function removeRefueling(?EquipmentRefuelingInterface $refueling): void
    {
        /** @var EquipmentRefuelingInterface $refueling */
        Assert::isInstanceOf(
            $refueling,
            EquipmentRefuelingInterface::class,
            'Refueling objects removed from a Equipment object have to implement EquipmentRefuelingInterface'
        );

        if ($this->hasRefueling($refueling)) {
            $this->refuelings->removeElement($refueling);
        }
    }

    public function hasRefueling(EquipmentRefuelingInterface $refueling): bool
    {
        return $this->refuelings->contains($refueling);
    }
}
