<?php

namespace App\Entity;

use App\Repository\UserCollectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserCollectionRepository::class)
 */
class UserCollection
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="collections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="collection", orphanRemoval=true)
     */
    private $items;

    /**
     * @ORM\ManyToOne(targetEntity=Topic::class, inversedBy="userCollections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $topic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $integer1_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $integer2_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $integer3_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $integer1_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $integer2_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $integer3_visible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $string1_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $string2_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $string3_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $string1_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $string2_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $string3_visible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text1_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text2_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text3_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $text1_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $text2_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $text3_visible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date1_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date2_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date3_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $date1_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $date2_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $date3_visible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boolean1_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boolean2_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boolean3_name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boolean1_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boolean2_visible;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boolean3_visible;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setCollection($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getCollection() === $this) {
                $item->setCollection(null);
            }
        }

        return $this;
    }

    public function getTopic(): ?Topic
    {
        return $this->topic;
    }

    public function setTopic(?Topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getInteger1Name(): ?string
    {
        return $this->integer1_name;
    }

    public function setInteger1Name(?string $integer1_name): self
    {
        $this->integer1_name = $integer1_name;

        return $this;
    }

    public function getInteger2Name(): ?string
    {
        return $this->integer2_name;
    }

    public function setInteger2Name(?string $integer2_name): self
    {
        $this->integer2_name = $integer2_name;

        return $this;
    }

    public function getInteger3Name(): ?string
    {
        return $this->integer3_name;
    }

    public function setInteger3Name(?string $integer3_name): self
    {
        $this->integer3_name = $integer3_name;

        return $this;
    }

    public function getInteger1Visible(): ?bool
    {
        return $this->integer1_visible;
    }

    public function setInteger1Visible(bool $integer1_visible): self
    {
        $this->integer1_visible = $integer1_visible;

        return $this;
    }

    public function getInteger2Visible(): ?bool
    {
        return $this->integer2_visible;
    }

    public function setInteger2Visible(bool $integer2_visible): self
    {
        $this->integer2_visible = $integer2_visible;

        return $this;
    }

    public function getInteger3Visible(): ?bool
    {
        return $this->integer3_visible;
    }

    public function setInteger3Visible(bool $integer3_visible): self
    {
        $this->integer3_visible = $integer3_visible;

        return $this;
    }

    public function getString1Name(): ?string
    {
        return $this->string1_name;
    }

    public function setString1Name(?string $string1_name): self
    {
        $this->string1_name = $string1_name;

        return $this;
    }

    public function getString2Name(): ?string
    {
        return $this->string2_name;
    }

    public function setString2Name(?string $string2_name): self
    {
        $this->string2_name = $string2_name;

        return $this;
    }

    public function getString3Name(): ?string
    {
        return $this->string3_name;
    }

    public function setString3Name(?string $string3_name): self
    {
        $this->string3_name = $string3_name;

        return $this;
    }

    public function getString1Visible(): ?bool
    {
        return $this->string1_visible;
    }

    public function setString1Visible(bool $string1_visible): self
    {
        $this->string1_visible = $string1_visible;

        return $this;
    }

    public function getString2Visible(): ?bool
    {
        return $this->string2_visible;
    }

    public function setString2Visible(bool $string2_visible): self
    {
        $this->string2_visible = $string2_visible;

        return $this;
    }

    public function getString3Visible(): ?bool
    {
        return $this->string3_visible;
    }

    public function setString3Visible(bool $string3_visible): self
    {
        $this->string3_visible = $string3_visible;

        return $this;
    }

    public function getText1Name(): ?string
    {
        return $this->text1_name;
    }

    public function setText1Name(?string $text1_name): self
    {
        $this->text1_name = $text1_name;

        return $this;
    }

    public function getText2Name(): ?string
    {
        return $this->text2_name;
    }

    public function setText2Name(?string $text2_name): self
    {
        $this->text2_name = $text2_name;

        return $this;
    }

    public function getText3Name(): ?string
    {
        return $this->text3_name;
    }

    public function setText3Name(?string $text3_name): self
    {
        $this->text3_name = $text3_name;

        return $this;
    }

    public function getText1Visible(): ?bool
    {
        return $this->text1_visible;
    }

    public function setText1Visible(bool $text1_visible): self
    {
        $this->text1_visible = $text1_visible;

        return $this;
    }

    public function getText2Visible(): ?bool
    {
        return $this->text2_visible;
    }

    public function setText2Visible(bool $text2_visible): self
    {
        $this->text2_visible = $text2_visible;

        return $this;
    }

    public function getText3Visible(): ?bool
    {
        return $this->text3_visible;
    }

    public function setText3Visible(bool $text3_visible): self
    {
        $this->text3_visible = $text3_visible;

        return $this;
    }

    public function getDate1Name(): ?string
    {
        return $this->date1_name;
    }

    public function setDate1Name(?string $date1_name): self
    {
        $this->date1_name = $date1_name;

        return $this;
    }

    public function getDate2Name(): ?string
    {
        return $this->date2_name;
    }

    public function setDate2Name(?string $date2_name): self
    {
        $this->date2_name = $date2_name;

        return $this;
    }

    public function getDate3Name(): ?string
    {
        return $this->date3_name;
    }

    public function setDate3Name(?string $date3_name): self
    {
        $this->date3_name = $date3_name;

        return $this;
    }

    public function getDate1Visible(): ?bool
    {
        return $this->date1_visible;
    }

    public function setDate1Visible(bool $date1_visible): self
    {
        $this->date1_visible = $date1_visible;

        return $this;
    }

    public function getDate2Visible(): ?bool
    {
        return $this->date2_visible;
    }

    public function setDate2Visible(bool $date2_visible): self
    {
        $this->date2_visible = $date2_visible;

        return $this;
    }

    public function getDate3Visible(): ?bool
    {
        return $this->date3_visible;
    }

    public function setDate3Visible(bool $date3_visible): self
    {
        $this->date3_visible = $date3_visible;

        return $this;
    }

    public function getBoolean1Name(): ?string
    {
        return $this->boolean1_name;
    }

    public function setBoolean1Name(?string $boolean1_name): self
    {
        $this->boolean1_name = $boolean1_name;

        return $this;
    }

    public function getBoolean2Name(): ?string
    {
        return $this->boolean2_name;
    }

    public function setBoolean2Name(?string $boolean2_name): self
    {
        $this->boolean2_name = $boolean2_name;

        return $this;
    }

    public function getBoolean3Name(): ?string
    {
        return $this->boolean3_name;
    }

    public function setBoolean3Name(?string $boolean3_name): self
    {
        $this->boolean3_name = $boolean3_name;

        return $this;
    }

    public function getBoolean1Visible(): ?bool
    {
        return $this->boolean1_visible;
    }

    public function setBoolean1Visible(bool $boolean1_visible): self
    {
        $this->boolean1_visible = $boolean1_visible;

        return $this;
    }

    public function getBoolean2Visible(): ?bool
    {
        return $this->boolean2_visible;
    }

    public function setBoolean2Visible(bool $boolean2_visible): self
    {
        $this->boolean2_visible = $boolean2_visible;

        return $this;
    }

    public function getBoolean3Visible(): ?bool
    {
        return $this->boolean3_visible;
    }

    public function setBoolean3Visible(bool $boolean3_visible): self
    {
        $this->boolean3_visible = $boolean3_visible;

        return $this;
    }
}
