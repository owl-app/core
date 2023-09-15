<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Equipment\Model\EquipmentInterface as BaseEquipmentnterface;
use Owl\Component\User\Model\UserInterface as BaseUserInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

class EquipmentRefueling implements EquipmentRefuelingInterface
{
    use TimestampableTrait;

    /** @var mixed */
    protected $id;

    /** @var \DateTimeInterface */
    protected $date;

    /** @var int */
    protected $mileage;

    /** @var float */
    protected $quantity;

    /** @var int */
    protected $value;

    /** @var string|null */
    protected $comment;

    /** @var BaseEquipmentnterface */
    protected $equipment;

    /** @var AdminUserInterface|null */
    protected $user;

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

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
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
