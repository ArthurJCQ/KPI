<?php

namespace App\Domain\User\Entity;

use App\Domain\ConfigurableUserTrait;
use App\Domain\DevSprintConfig\Entity\DevSprintConfig;
use App\Domain\Sprint\Entity\Sprint;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
#[ORM\Table(name: '`user`')]
class User implements UserInterface
{
    use ConfigurableUserTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private string $email;

    #[ORM\Column]
    private string $name;

    #[ORM\Column(nullable: true)]
    private ?string $pictureUrl = null;

    /** @var array<string> */
    #[ORM\Column]
    private array $roles = [];

    /** @var Collection<int, Sprint> */
    #[ORM\ManyToMany(targetEntity: Sprint::class, mappedBy: 'developpers')]
    private Collection $sprints;

    /** @var Collection<int, DevSprintConfig> */
    #[ORM\OneToMany(mappedBy: 'developper', targetEntity: DevSprintConfig::class, orphanRemoval: true)]
    private Collection $devSprintConfigs;

    public function __construct()
    {
        $this->sprints = new ArrayCollection();
        $this->devSprintConfigs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPictureUrl(): ?string
    {
        return $this->pictureUrl;
    }

    public function setPictureUrl(?string $pictureUrl): self
    {
        $this->pictureUrl = $pictureUrl;

        return $this;
    }

    /** @see UserInterface */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /** @see UserInterface */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /** @param array<string> $roles */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /** @see UserInterface */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /** @return Collection<int, Sprint> */
    public function getSprints(): Collection
    {
        return $this->sprints;
    }

    public function addSprint(Sprint $sprint): self
    {
        if (!$this->sprints->contains($sprint)) {
            $this->sprints->add($sprint);
            $sprint->addDevelopper($this);
        }

        return $this;
    }

    public function removeSprint(Sprint $sprint): self
    {
        if ($this->sprints->removeElement($sprint)) {
            $sprint->removeDevelopper($this);
        }

        return $this;
    }

    /** @return Collection<int, DevSprintConfig> */
    public function getDevSprintConfigs(): Collection
    {
        return $this->devSprintConfigs;
    }

    public function getDevSprintConfig(int $sprintId): ?DevSprintConfig
    {
        /** @var DevSprintConfig $devSprintConfig */
        foreach ($this->devSprintConfigs as $devSprintConfig) {
            if ($devSprintConfig->getSprint()->getId() !== $sprintId) {
                continue;
            }

            return $devSprintConfig;
        }

        return null;
    }

    public function addDevSprintConfig(DevSprintConfig $devSprintConfig): self
    {
        if (!$this->devSprintConfigs->contains($devSprintConfig)) {
            $this->devSprintConfigs->add($devSprintConfig);
            $devSprintConfig->setDevelopper($this);
        }

        return $this;
    }

    public function removeDevSprintConfig(DevSprintConfig $devSprintConfig): self
    {
        $this->devSprintConfigs->removeElement($devSprintConfig);

        return $this;
    }
}
