<?php

namespace App\Entity;

use App\Repository\StaffRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StaffRepository::class)
 */
class Staff
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=Timekeeping::class, mappedBy="staff", orphanRemoval=true)
     */
    private $stafftimekeeping;

    /**
     * @ORM\OneToMany(targetEntity=StaffShift::class, mappedBy="staff", orphanRemoval=true)
     */
    private $shiftOfStaff;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function __construct()
    {
        $this->stafftimekeeping = new ArrayCollection();
        $this->shiftOfStaff = new ArrayCollection();
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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, Timekeeping>
     */
    public function getStafftimekeeping(): Collection
    {
        return $this->stafftimekeeping;
    }

    public function addStafftimekeeping(Timekeeping $stafftimekeeping): self
    {
        if (!$this->stafftimekeeping->contains($stafftimekeeping)) {
            $this->stafftimekeeping[] = $stafftimekeeping;
            $stafftimekeeping->setStaff($this);
        }

        return $this;
    }

    public function removeStafftimekeeping(Timekeeping $stafftimekeeping): self
    {
        if ($this->stafftimekeeping->removeElement($stafftimekeeping)) {
            // set the owning side to null (unless already changed)
            if ($stafftimekeeping->getStaff() === $this) {
                $stafftimekeeping->setStaff(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, StaffShift>
     */
    public function getShiftOfStaff(): Collection
    {
        return $this->shiftOfStaff;
    }

    public function addShiftOfStaff(StaffShift $shiftOfStaff): self
    {
        if (!$this->shiftOfStaff->contains($shiftOfStaff)) {
            $this->shiftOfStaff[] = $shiftOfStaff;
            $shiftOfStaff->setStaff($this);
        }

        return $this;
    }

    public function removeShiftOfStaff(StaffShift $shiftOfStaff): self
    {
        if ($this->shiftOfStaff->removeElement($shiftOfStaff)) {
            // set the owning side to null (unless already changed)
            if ($shiftOfStaff->getStaff() === $this) {
                $shiftOfStaff->setStaff(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }
    
}
