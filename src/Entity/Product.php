<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="product:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="product:item"}}}
 *     )
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @groups({"product:list","product:item"})
     */

    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @groups({"product:list"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @groups({"product:list"})
     */
    private $brand;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @groups({"product:list"})
     */
    private $width;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @groups({"product:list"})
     */
    private $large;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @groups({"product:list"})
     */
    private $weight;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @groups({"product:list"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @groups({"product:list"})
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @groups({"product:list"})
     */
    private $category;

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

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(?int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getLarge(): ?int
    {
        return $this->large;
    }

    public function setLarge(?int $large): self
    {
        $this->large = $large;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
