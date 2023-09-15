<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Owl\Component\Core\Model\NotificationInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @template T of NotificationInterface
 *
 * @extends RepositoryInterface<T>
 */
interface NotificationRepositoryInterface extends RepositoryInterface
{
}
