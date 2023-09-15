<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Equipment\Model\EquipmentInterface as BaseEquipmentnterface;
use Owl\Component\User\Model\UserInterface as BaseUserInterface;

class EquipmentEvent implements EquipmentEventInterface
{
    /** @var mixed */
    protected $id;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var \DateTimeInterface */
    protected $dateNotify;

    /** @var string */
    protected $description;

    /** @var string */
    protected $notifyState;

    /** @var BaseEquipmentnterface */
    protected $equipment;

    /** @var AdminUserInterface|null */
    protected $user;

    /** @var \DateTimeInterface|null */
    protected $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateNotify(): ?\DateTimeInterface
    {
        return $this->dateNotify;
    }

    public function setDateNotify(?\DateTimeInterface $dateNotify): void
    {
        $this->dateNotify = $dateNotify;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getNotifyState(): string
    {
        return $this->notifyState;
    }

    public function setNotifyState(?string $notifyState): void
    {
        $this->notifyState = $notifyState;
    }

    /**
     * @return BaseEquipmentnterface
     */
    public function getEquipment(): ?BaseEquipmentnterface
    {
        return $this->equipment;
    }

    public function setEquipment(?BaseEquipmentnterface $equipment): void
    {
        $this->equipment = $equipment;
    }

    /**
     * @return AdminUserInterface|null
     */
    public function getUser(): ?BaseUserInterface
    {
        return $this->user;
    }

    public function setUser(?BaseUserInterface $user): void
    {
        $this->user = $user;
    }
}
