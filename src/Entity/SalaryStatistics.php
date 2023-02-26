<?php

namespace App\Entity;

use App\Repository\SalaryStatisticsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SalaryStatisticsRepository::class)
 */
class SalaryStatistics
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $basicSalary;

    /**
     * @ORM\Column(type="float")
     */
    private $coefficientsSalary;

    /**
     * @ORM\OneToMany(targetEntity=Timekeeping::class, mappedBy="salary", orphanRemoval=true)
     */
    private $salaryTimekeeping;

    public function __construct()
    {
        $this->salaryTimekeeping = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBasicSalary(): ?float
    {
        return $this->basicSalary;
    }

    public function setBasicSalary(float $basicSalary): self
    {
        $this->basicSalary = $basicSalary;

        return $this;
    }

    public function getCoefficientsSalary(): ?float
    {
        return $this->coefficientsSalary;
    }

    public function setCoefficientsSalary(float $coefficientsSalary): self
    {
        $this->coefficientsSalary = $coefficientsSalary;

        return $this;
    }

    /**
     * @return Collection<int, Timekeeping>
     */
    public function getSalaryTimekeeping(): Collection
    {
        return $this->salaryTimekeeping;
    }

    public function addSalaryTimekeeping(Timekeeping $salaryTimekeeping): self
    {
        if (!$this->salaryTimekeeping->contains($salaryTimekeeping)) {
            $this->salaryTimekeeping[] = $salaryTimekeeping;
            $salaryTimekeeping->setSalary($this);
        }

        return $this;
    }

    public function removeSalaryTimekeeping(Timekeeping $salaryTimekeeping): self
    {
        if ($this->salaryTimekeeping->removeElement($salaryTimekeeping)) {
            // set the owning side to null (unless already changed)
            if ($salaryTimekeeping->getSalary() === $this) {
                $salaryTimekeeping->setSalary(null);
            }
        }

        return $this;
    }
}
