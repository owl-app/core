<?php

declare(strict_types=1);

namespace Owl\Component\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Owl\Component\Company\Model\CompanyInterface as BaseCompanyInterface;
use Owl\Component\Rbac\Model\RoleInterface as BaseRoleInterface;
use Owl\Component\User\Model\User;

class AdminUser extends User implements AdminUserInterface
{
    /** @var string */
    protected $displayName;

    /** @var string */
    protected $firstName;

    /** @var string */
    protected $lastName;

    /** @var string */
    protected $phone;

    /** @var string */
    protected $note;

    /** @var string */
    protected $localeCode;

    /** @var array */
    protected $permissions = [];

    /** @var BaseRoleInterface */
    protected $role;

    /**
     * @var Collection|BaseCompanyInterface[]
     *
     * @psalm-var Collection<array-key, BaseCompanyInterface>
     */
    protected $companies;

    /**
     * @var Collection|NotificationAcceptedInterface[]
     *
     * @psalm-var Collection<array-key, NotificationAcceptedInterface>
     */
    protected $acceptedNotifications;

    /** @var AdminUserRegistrationDataInterface|null */
    protected $registration;

    public function __construct()
    {
        parent::__construct();

        /** @var ArrayCollection<array-key, NotificationAcceptedInterface> $this->acceptedNotifications */
        $this->acceptedNotifications = new ArrayCollection();

        /** @var ArrayCollection<array-key, BaseCompanyInterface> $this->companies */
        $this->companies = new ArrayCollection();

        $this->localeCode = 'en';
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName): void
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getLocaleCode(): ?string
    {
        return $this->localeCode;
    }

    public function setLocaleCode(?string $code): void
    {
        $this->localeCode = $code;
    }

    public function setPermissions(array $permissions): void
    {
        $this->permissions = $permissions;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @return BaseRoleInterface
     */
    public function getRole(): ?BaseRoleInterface
    {
        return $this->role;
    }

    public function setRole(?BaseRoleInterface $role): void
    {
        $this->role = $role;
    }

    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(BaseCompanyInterface $company): void
    {
        if (!$this->hasCompany($company)) {
            $this->companies->add($company);
        }
    }

    public function removeCompany(BaseCompanyInterface $company): void
    {
        if ($this->hasCompany($company)) {
            $this->companies->removeElement($company);
        }
    }

    public function hasCompany(BaseCompanyInterface $company): bool
    {
        return $this->companies->contains($company);
    }

    /**
     * @psalm-return Collection<array-key, NotificationAcceptedInterface>
     */
    public function getAcceptedNotifications(): Collection
    {
        return $this->acceptedNotifications;
    }

    public function addAcceptedNotification(NotificationAcceptedInterface $notification): void
    {
        if (!$this->hasAcceptedNotification($notification)) {
            $this->acceptedNotifications->add($notification);
        }
    }

    public function removeAcceptedNotification(NotificationAcceptedInterface $notification): void
    {
        if ($this->hasAcceptedNotification($notification)) {
            $this->acceptedNotifications->removeElement($notification);
        }
    }

    public function hasAcceptedNotification(NotificationAcceptedInterface $notification): bool
    {
        return $this->acceptedNotifications->contains($notification);
    }

    public function getRegistration(): ?AdminUserRegistrationDataInterface
    {
        return $this->registration;
    }

    public function setRegistration(?AdminUserRegistrationDataInterface $registration): void
    {
        $this->registration = $registration;

        if ($registration instanceof AdminUserRegistrationDataInterface) {
            $registration->setUser($this);
        }
    }

    public function hasRegistration(): bool
    {
        return null !== $this->registration;
    }
}
