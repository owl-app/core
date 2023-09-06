<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Owl\Component\Core\Model\NotificationInterface;
/**
 * @template T of NotificationInterface
 *
 * @extends RepositoryInterface<T>
 */
interface NotificationRepositoryInterface extends RepositoryInterface
{
}
