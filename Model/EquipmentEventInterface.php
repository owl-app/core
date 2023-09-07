<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Core\Model\Authorization\OwnerableUserInterface;
use Owl\Component\User\Model\UserAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

interface EquipmentEventInterface extends
    ResourceInterface,
    UserAwareInterface,
    OwnerableUserInterface,
    EquipmentAddOnInterface
{
    public const NOTIFY_STATE_WAITING = 'waiting';

    public const NOTIFY_STATE_SENT = 'sent';

    public function getDate(): ?\DateTimeInterface;

    public function setDate(?\DateTimeInterface $date): void;

    public function getDateNotify(): ?\DateTimeInterface;

    public function setDateNotify(?\DateTimeInterface $dateNotify): void;

    public function getDescription(): string;

    public function setDescription(string $description): void;

    public function getNotifyState(): string;

    public function setNotifyState(?string $notifyState): void;
}