<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $integer1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $integer2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $integer3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $string1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $string2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $string3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $date3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boolean1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boolean2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $boolean3;

    /**
     * @ORM\ManyToOne(targetEntity=UserCollection::class, inversedBy="items")
     * @ORM\JoinColumn(nullable=false)
     */
    private $collection;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="items")
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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

    public function getInteger1(): ?string
    {
        return $this->integer1;
    }

    public function setInteger1(?string $integer1): self
    {
        $this->integer1 = $integer1;

        return $this;
    }

    public function getInteger2(): ?string
    {
        return $this->integer2;
    }

    public function setInteger2(?string $integer2): self
    {
        $this->integer2 = $integer2;

        return $this;
    }

    public function getInteger3(): ?string
    {
        return $this->integer3;
    }

    public function setInteger3(?string $integer3): self
    {
        $this->integer3 = $integer3;

        return $this;
    }

    public function getString1(): ?string
    {
        return $this->string1;
    }

    public function setString1(?string $string1): self
    {
        $this->string1 = $string1;

        return $this;
    }

    public function getString2(): ?string
    {
        return $this->string2;
    }

    public function setString2(?string $string2): self
    {
        $this->string2 = $string2;

        return $this;
    }

    public function getString3(): ?string
    {
        return $this->string3;
    }

    public function setString3(?string $string3): self
    {
        $this->string3 = $string3;

        return $this;
    }

    public function getText1(): ?string
    {
        return $this->text1;
    }

    public function setText1(?string $text1): self
    {
        $this->text1 = $text1;

        return $this;
    }

    public function getText2(): ?string
    {
        return $this->text2;
    }

    public function setText2(?string $text2): self
    {
        $this->text2 = $text2;

        return $this;
    }

    public function getText3(): ?string
    {
        return $this->text3;
    }

    public function setText3(?string $text3): self
    {
        $this->text3 = $text3;

        return $this;
    }

    public function getDate1(): ?string
    {
        return $this->date1;
    }

    public function setDate1(?string $date1): self
    {
        $this->date1 = $date1;

        return $this;
    }

    public function getDate2(): ?string
    {
        return $this->date2;
    }

    public function setDate2(?string $date2): self
    {
        $this->date2 = $date2;

        return $this;
    }

    public function getDate3(): ?string
    {
        return $this->date3;
    }

    public function setDate3(?string $date3): self
    {
        $this->date3 = $date3;

        return $this;
    }

    public function getBoolean1(): ?string
    {
        return $this->boolean1;
    }

    public function setBoolean1(?string $boolean1): self
    {
        $this->boolean1 = $boolean1;

        return $this;
    }

    public function getBoolean2(): ?string
    {
        return $this->boolean2;
    }

    public function setBoolean2(?string $boolean2): self
    {
        $this->boolean2 = $boolean2;

        return $this;
    }

    public function getBoolean3(): ?string
    {
        return $this->boolean3;
    }

    public function setBoolean3(?string $boolean3): self
    {
        $this->boolean3 = $boolean3;

        return $this;
    }

    public function getExtraFields()
    {
        return ['integer', 'string', 'text', 'date', 'boolean'];
    }

    public function getExtraFieldValue($name, $key): string
    {
        if (in_array($name, $this->getExtraFields()) && in_array($key, [1, 2, 3]))
            return $this->{$name . $key};
        else throw new NoSuchPropertyException();
    }

    public function getCollection(): ?UserCollection
    {
        return $this->collection;
    }

    public function setCollection(?UserCollection $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }
}
