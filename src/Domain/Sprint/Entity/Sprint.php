<?php

namespace App\Domain\Sprint\Entity;

use App\Domain\DevSprintConfig\Entity\DevSprintConfig;
use App\Domain\User\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Sprint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $startDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $endDate = null;

    /** @var Collection<int, User> */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'sprints')]
    private Collection $developpers;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(nullable: true)]
    private ?int $calculatedCapacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $engagedCapacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $effectiveCapacity = null;

    #[ORM\Column(nullable: true)]
    private ?int $estimatedVelocity = null;

    #[ORM\Column(nullable: true)]
    private ?int $effectiveVelocity = null;

    /** @var Collection<int, DevSprintConfig> */
    #[ORM\OneToMany(mappedBy: 'sprint', targetEntity: DevSprintConfig::class, orphanRemoval: true)]
    private Collection $devSprintConfigs;

    public function __construct()
    {
        $this->developpers = new ArrayCollection();
        $this->devSprintConfigs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getDeveloppers(): Collection
    {
        return $this->developpers;
    }

    public function addDevelopper(User $developper): self
    {
        if (!$this->developpers->contains($developper)) {
            $this->developpers->add($developper);
        }

        return $this;
    }

    public function removeDevelopper(User $developper): self
    {
        $this->developpers->removeElement($developper);

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getCalculatedCapacity(): ?int
    {
        return $this->calculatedCapacity;
    }

    public function setCalculatedCapacity(?int $calculatedCapacity): self
    {
        $this->calculatedCapacity = $calculatedCapacity;

        return $this;
    }

    public function getEngagedCapacity(): ?int
    {
        return $this->engagedCapacity;
    }

    public function setEngagedCapacity(?int $engagedCapacity): self
    {
        $this->engagedCapacity = $engagedCapacity;

        return $this;
    }

    public function getEffectiveCapacity(): ?int
    {
        return $this->effectiveCapacity;
    }

    public function setEffectiveCapacity(?int $effectiveCapacity): self
    {
        $this->effectiveCapacity = $effectiveCapacity;

        return $this;
    }

    public function getEstimatedVelocity(): ?int
    {
        return $this->estimatedVelocity;
    }

    public function setEstimatedVelocity(?int $estimatedVelocity): self
    {
        $this->estimatedVelocity = $estimatedVelocity;

        return $this;
    }

    public function getEffectiveVelocity(): ?int
    {
        return $this->effectiveVelocity;
    }

    public function setEffectiveVelocity(?int $effectiveVelocity): self
    {
        $this->effectiveVelocity = $effectiveVelocity;

        return $this;
    }

    /**
     * @return Collection<int, DevSprintConfig>
     */
    public function getDevSprintConfigs(): Collection
    {
        return $this->devSprintConfigs;
    }

    public function addDevSprintConfig(DevSprintConfig $devSprintConfig): self
    {
        if (!$this->devSprintConfigs->contains($devSprintConfig)) {
            $this->devSprintConfigs->add($devSprintConfig);
            $devSprintConfig->setSprint($this);
        }

        return $this;
    }

    public function removeDevSprintConfig(DevSprintConfig $devSprintConfig): self
    {
        $this->devSprintConfigs->removeElement($devSprintConfig);

        return $this;
    }
}
