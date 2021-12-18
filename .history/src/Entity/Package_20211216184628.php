<?php

namespace App\Entity;

use App\Repository\PackageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PackageRepository::class)
 */
class Package
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", )
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="packages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity=Sender::class, inversedBy="packages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sender;

    /**
     * @ORM\OneToOne(targetEntity=Locker::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $locker;

    /**
     * @ORM\ManyToOne(targetEntity=Hub::class, inversedBy="packages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $hub;

    /**
     * @ORM\Column(type="json")
     */
    private $status = [];

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="userSender", cascade={"persist", "remove"})
     */
    private $userSender;



    public function __construct()
    {
        $this->users = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getSender(): ?Sender
    {
        return $this->sender;
    }

    public function setSender(?Sender $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getLocker(): ?Locker
    {
        return $this->locker;
    }

    public function setLocker(Locker $locker): self
    {
        $this->locker = $locker;

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

    public function getStatus(): ?array
    {
        return $this->status;
    }

    public function setStatus(array $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUserSender(): ?User
    {
        return $this->userSender;
    }

    public function setUserSender(?User $userSender): self
    {
        // unset the owning side of the relation if necessary
        if ($userSender === null && $this->userSender !== null) {
            $this->userSender->setUserSender(null);
        }

        // set the owning side of the relation if necessary
        if ($userSender !== null && $userSender->getUserSender() !== $this) {
            $userSender->setUserSender($this);
        }

        $this->userSender = $userSender;

        return $this;
    }
}
