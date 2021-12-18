<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Repository\LockerRepository;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LockerRepository::class)
 */
class Locker
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberLocker;

    /**
     * @ORM\ManyToOne(targetEntity=Hub::class, inversedBy="lockers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hub;

    /**
     * @ORM\OneToMany(targetEntity=Package::class, mappedBy="locker")
     */
    private $packages;

    public function __construct()
    {
        $this->packages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNumberLocker(): ?int
    {
        return $this->numberLocker;
    }

    public function setNumberLocker(int $numberLocker): self
    {
        $this->numberLocker = $numberLocker;

        return $this;
    }

    public function getHub(): ?Hub
    {
        return $this->hub;
    }

    public function setHub(?Hub $hub): self
    {
        $this->hub = $hub;

        return $this;
    }


    /**
     * @return Collection|Package[]
     */
    public function getPackages(): Collection
    {
        return $this->packages;
    }

    public function addPackage(Package $package): self
    {
        if (!$this->packages->contains($package)) {
            $this->packages[] = $package;
            $package->setLocker($this);
        }

        return $this;
    }

    public function removePackage(Package $package): self
    {
        if ($this->packages->removeElement($package)) {
            // set the owning side to null (unless already changed)
            if ($package->getLocker() === $this) {
                $package->setLocker(null);
            }
        }

        return $this;
    }
}
