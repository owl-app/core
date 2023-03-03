<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Company\Model\CompanyAwareInterface;
use Owl\Component\Core\Model\Authorization\OwnerableCompanyInterface;
use Owl\Component\File\Model\FileableInterface;
use Owl\Component\Status\Model\StatusableInterface;
use Owl\Component\Suggestion\Model\SuggestionInterface as BaseSuggestionInterface;
use Owl\Component\User\Model\UserAwareInterface;

interface SuggestionInterface extends 
    BaseSuggestionInterface,
    CompanyAwareInterface,
    UserAwareInterface,
    OwnerableCompanyInterface,
    StatusableInterface,
    FileableInterface
{
}