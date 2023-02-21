<?php

namespace App\Entity;

use App\Repository\TimekeepingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimekeepingRepository::class)
 */
class Timekeeping
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=Staff::class, inversedBy="stafftimekeeping")
     * @ORM\JoinColumn(nullable=false)
     */
    private $staff;

    /**
     * @ORM\ManyToOne(targetEntity=SalaryStatistics::class, inversedBy="salaryTimekeeping")
     * @ORM\JoinColumn(nullable=false)
     */
    private $salary;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStaff(): ?Staff
    {
        return $this->staff;
    }

    public function setStaff(?Staff $staff): self
    {
        $this->staff = $staff;

        return $this;
    }

    public function getSalary(): ?SalaryStatistics
    {
        return $this->salary;
    }

    public function setSalary(?SalaryStatistics $salary): self
    {
        $this->salary = $salary;

        return $this;
    }
}
