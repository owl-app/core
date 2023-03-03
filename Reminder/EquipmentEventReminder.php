<?php

declare(strict_types=1);

namespace Owl\Component\Core\Reminder;

use Owl\Bundle\CoreBundle\Mailer\EquipmentEventEmailManagerInterface;
use Owl\Component\Core\EquipmentEventTransitions;
use Owl\Component\Core\Model\EquipmentEventInterface;
use Owl\Component\Core\Repository\EquipmentEventRepositoryInterface;
use Psr\Log\LoggerInterface;
use SM\Factory\Factory;
use SM\SMException;

final class EquipmentEventReminder implements EquipmentEventReminderInterface
{
    public function __construct(
        private EquipmentEventRepositoryInterface $equipmentEventRepository,
        private EquipmentEventEmailManagerInterface $equipmentEventEmailManager,
        private Factory $stateMachineFactory,
        private LoggerInterface $logger
    ) {
    }

    public function remind(): void
    {
        $waitingEquipmentEvents = $this->equipmentEventRepository->findWaitingToSend();

        foreach ($waitingEquipmentEvents as $waitingEquipmentEvent) {
            try{
                $this->equipmentEventEmailManager->sendNotifyEmail($waitingEquipmentEvent);
            } catch(\Swift_TransportException $e) {
                $this->logger->error(
                    sprintf('An error occurred while sending notify email for equipment event #%s', $waitingEquipmentEvent->getId()),
                    ['exception' => $e, 'message' => $e->getMessage()]
                );
            }

            try {
                $this->sendedEquipmentEvent($waitingEquipmentEvent);
            } catch (SMException $e) {
                $this->logger->error(
                    sprintf('An error occurred while changing status equipment event to sended #%s', $waitingEquipmentEvent->getId()),
                    ['exception' => $e, 'message' => $e->getMessage()]
                );
            }
        }
    }

    private function sendedEquipmentEvent(EquipmentEventInterface $expiredUnpaidOrder): void
    {
        $stateMachine = $this->stateMachineFactory->get($expiredUnpaidOrder, EquipmentEventTransitions::GRAPH);
        $stateMachine->apply(EquipmentEventTransitions::TRANSITION_SEND);
    }
}
