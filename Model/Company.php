<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Owl\Component\Company\Model\Company as BaseCompany;

class Company extends BaseCompany implements CompanyInterface
{
    /**
     * @var object|null
     */
    protected $owner;

    public function getOwner(): object|null
    {
        return $this->owner;
    }

    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }
}
