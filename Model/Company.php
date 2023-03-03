<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Owl\Component\File\Model\FileableInterface;
use Owl\Component\File\Model\FileInterface;
use Owl\Component\Company\Model\Company as BaseCompany;

class Company extends BaseCompany implements CompanyInterface
{
    /**
     * @var object|null
     */
    protected $owner;

    public function getOwner()
    {
        return $this->owner;
    }

    public function setOwner($owner): void
    {
        $this->owner = $owner;
    }
}
