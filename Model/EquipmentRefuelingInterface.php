<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Core\Model\Authorization\OwnerableUserInterface;
use Owl\Component\User\Model\UserAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface EquipmentRefuelingInterface extends
    ResourceInterface,
    UserAwareInterface,
    OwnerableUserInterface,
    EquipmentAddOnInterface
{
    public function getDate(): ?\DateTimeInterface;

    public function setDate(?\DateTimeInterface $date): void;

    public function getMileage(): int;

    public function setMileage(int $mileage): void;

    public function getQuantity(): float;

    public function setQuantity(float $quantity): void;

    public function getValue(): int;

    public function setValue(int $value): void;

    public function getComment(): ?string;

    public function setComment(string $comment): void;
}
