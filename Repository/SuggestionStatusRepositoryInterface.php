<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Owl\Component\Status\Model\StatusInterface;

/**
 * @template T of StatusInterface
 *
 * @extends RepositoryInterface<T>
 */
interface SuggestionStatusRepositoryInterface extends RepositoryInterface
{
}
