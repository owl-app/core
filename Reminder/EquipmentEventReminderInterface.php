<?php

declare(strict_types=1);

namespace Owl\Component\Core\Reminder;

interface EquipmentEventReminderInterface
{
    public function remind(): void;
}
