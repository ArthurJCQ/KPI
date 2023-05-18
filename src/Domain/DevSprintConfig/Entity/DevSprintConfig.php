<?php

namespace App\Domain\DevSprintConfig\Entity;

use App\Domain\ConfigurableUserTrait;
use App\Domain\Sprint\Entity\Sprint;
use App\Domain\User\Entity\User;
use App\Infrastructure\Persistence\Doctrine\Repository\DevSprintConfigRepositoryDoctrine;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class DevSprintConfig
{
    use ConfigurableUserTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'devSprintConfigs')]
    #[ORM\JoinColumn(nullable: false)]
    private Sprint $sprint;

    #[ORM\ManyToOne(inversedBy: 'devSprintConfigs')]
    #[ORM\JoinColumn(nullable: false)]
    private User $developper;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSprint(): Sprint
    {
        return $this->sprint;
    }

    public function setSprint(Sprint $sprint): self
    {
        $this->sprint = $sprint;

        return $this;
    }

    public function getDevelopper(): User
    {
        return $this->developper;
    }

    public function setDevelopper(User $developper): self
    {
        $this->developper = $developper;

        return $this;
    }
}
