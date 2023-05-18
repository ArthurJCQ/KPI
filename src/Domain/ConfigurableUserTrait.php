<?php

declare(strict_types=1);

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

trait ConfigurableUserTrait
{
    #[ORM\Column(options: ['default' => 0])]
    private int $nbDaysOff = 0;

    #[ORM\Column(options: ['default' => 1.0])]
    private float $coeff = 1.0;

    #[ORM\Column(options: ['default' => true])]
    private bool $isActive = false;

    #[ORM\Column(options: ['default' => true])]
    private bool $isShield = false;

    public function getNbDaysOff(): ?int
    {
        return $this->nbDaysOff;
    }

    public function setNbDaysOff(int $nbDaysOff): self
    {
        $this->nbDaysOff = $nbDaysOff;

        return $this;
    }

    public function getCoeff(): ?float
    {
        return $this->coeff;
    }

    public function setCoeff(float $coeff): self
    {
        $this->coeff = $coeff;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isIsShield(): ?bool
    {
        return $this->isShield;
    }

    public function setIsShield(bool $isShield): self
    {
        $this->isShield = $isShield;

        return $this;
    }
}
