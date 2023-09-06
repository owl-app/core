<?php

declare(strict_types=1);

namespace Owl\Component\Core\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Owl\Component\Suggestion\Model\SuggestionInterface;

/**
 * @template T of SuggestionInterface
 *
 * @extends RepositoryInterface<T>
 */
interface SuggestionRepositoryInterface extends RepositoryInterface
{
}
