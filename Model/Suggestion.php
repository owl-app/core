<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Owl\Component\File\Model\FileInterface;
use Owl\Component\Status\Model\StatusInterface;
use Owl\Component\Suggestion\Model\Suggestion as BaseSuggestion;
use Owl\Component\Company\Model\CompanyInterface as BaseCompanyInterface;
use Owl\Component\User\Model\UserInterface as BaseUserInterface;

class Suggestion extends BaseSuggestion implements SuggestionInterface
{
    /**
     * @var \Owl\Component\Core\Model\AdminUserInterface|null
     */
    protected $user;

    /**
     * @var \Owl\Component\Core\Model\CompanyInterface|null
     */
    protected $company;

    /**
     * @var Collection|FileInterface[]
     *
     * @psalm-var Collection<array-key, FileInterface>
     */
    protected $files;

    /**
     * @var Collection|StatusInterface[]
     *
     * @psalm-var Collection<array-key, StatusInterface>
     */
    protected $statuses;


    public function __construct()
    {
        parent::__construct();

        /** @var ArrayCollection<array-key, FileInterface> $this->files */
        $this->files = new ArrayCollection();
    }

    public function getName(): string
    {
        return $this->title;
    }

    public function getUser(): ?BaseUserInterface
    {
        return $this->user;
    }

    public function setUser(?BaseUserInterface $user): void
    {
        $this->user = $user;
    }

    public function getCompany(): ?BaseCompanyInterface
    {
        return $this->company;
    }

    public function setCompany(?BaseCompanyInterface $company): void
    {
        $this->company = $company;
    }

    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(FileInterface $file): void
    {
        $this->files->add($file);
    }

    public function removeFile(FileInterface $file): void
    {
        $this->files->removeElement($file);
    }

    public function getStatuses(): Collection
    {
        return $this->statuses;
    }

    public function addStatus(StatusInterface $status): void
    {
        $this->statuses->add($status);
    }

    public function removeStatus(StatusInterface $status): void
    {
        $this->statuses->removeElement($status);
    }
}
