<?php

namespace App\Entity;

use App\Repository\TopicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TopicRepository::class)
 */
class Topic
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
     * @ORM\OneToMany(targetEntity=UserCollection::class, mappedBy="topic", orphanRemoval=true)
     */
    private $userCollections;

    public function __construct()
    {
        $this->userCollections = new ArrayCollection();
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

    /**
     * @return Collection|UserCollection[]
     */
    public function getUserCollections(): Collection
    {
        return $this->userCollections;
    }

    public function addUserCollection(UserCollection $userCollection): self
    {
        if (!$this->userCollections->contains($userCollection)) {
            $this->userCollections[] = $userCollection;
            $userCollection->setTopic($this);
        }

        return $this;
    }

    public function removeUserCollection(UserCollection $userCollection): self
    {
        if ($this->userCollections->removeElement($userCollection)) {
            // set the owning side to null (unless already changed)
            if ($userCollection->getTopic() === $this) {
                $userCollection->setTopic(null);
            }
        }

        return $this;
    }
}
