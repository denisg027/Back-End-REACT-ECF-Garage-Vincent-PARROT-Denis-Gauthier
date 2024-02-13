<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "cars", uniqueConstraints: [new ORM\UniqueConstraint(name: "reference", columns: ["reference"])], indexes: [new ORM\Index(name: "idUtilisateur", columns: ["responsible_employee"])])]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $brand = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $model = null;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $yearOfCirculation = null;

    #[ORM\Column(type: "string", length: 20)]
    private ?string $fuel = null;

    #[ORM\Column(type: "integer")]
    private ?int $mileage = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $pictures = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $pictures1 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $pictures2 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $pictures3 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $pictures4 = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $pictures5 = null;

    #[ORM\Column(type: "string", length: 20)]
    private ?string $reference = null;

    #[ORM\Column(type: "text")]
    private ?string $features = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $equipments = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $options = null;

    #[ORM\Column(type: "string", length: 20)]
    private ?string $category = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $responsibleEmployee = null;

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getBrand(): ?string
    {
        return $this->brand;
    }
    public function getModel(): ?string
    {
        return $this->model;
    }
    public function getPrice(): ?string
    {
        return $this->price;
    }
    public function getYearOfCirculation(): ?\DateTimeInterface
    {
        return $this->yearOfCirculation;
    }
    public function getFuel(): ?string
    {
        return $this->fuel;
    }
    public function getMileage(): ?int
    {
        return $this->mileage;
    }
    public function getPictures(): ?string
    {
        return $this->pictures;
    }
    public function getPictures1(): ?string
    {
        return $this->pictures1;
    }
    public function getPictures2(): ?string
    {
        return $this->pictures2;
    }
    public function getPictures3(): ?string
    {
        return $this->pictures3;
    }
    public function getPictures4(): ?string
    {
        return $this->pictures4;
    }
    public function getPictures5(): ?string
    {
        return $this->pictures5;
    }
    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function getFeatures(): ?string
    {
        return $this->features;
    }

    public function getEquipments(): ?string
    {
        return $this->equipments;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }
    public function getResponsibleEmployee(): ?string
    {
        return $this->responsibleEmployee;
    }

    // Setters
    public function setBrand(?string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }
    public function setModel(?string $model): self
    {
        $this->model = $model;
        return $this;
    }
    public function setPrice(?string $price): self
    {
        $this->price = $price;
        return $this;
    }
    public function setYearOfCirculation(?\DateTimeInterface $yearOfCirculation): self
    {
        $this->yearOfCirculation = $yearOfCirculation;
        return $this;
    }
    public function setFuel(?string $fuel): self
    {
        $this->fuel = $fuel;
        return $this;
    }
    public function setMileage(?int $mileage): self
    {
        $this->mileage = $mileage;
        return $this;
    }
    public function setPictures(?string $pictures): self
    {
        $this->pictures = $pictures;
        return $this;
    }
    public function setPictures1(?string $pictures1): self
    {
        $this->pictures1 = $pictures1;
        return $this;
    }
    public function setPictures2(?string $pictures2): self
    {
        $this->pictures2 = $pictures2;
        return $this;
    }
    public function setPictures3(?string $pictures3): self
    {
        $this->pictures3 = $pictures3;
        return $this;
    }
    public function setPictures4(?string $pictures4): self
    {
        $this->pictures4 = $pictures4;
        return $this;
    }
    public function setPictures5(?string $pictures5): self
    {
        $this->pictures5 = $pictures5;
        return $this;
    }
    public function setReference(?string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }
    public function setFeatures(?string $features): self
    {
        $this->features = $features;
        return $this;
    }
    public function setEquipments(?string $equipments): self
    {
        $this->equipments = $equipments;
        return $this;
    }
    public function setOptions(?string $options): self
    {
        $this->options = $options;
        return $this;
    }
    public function setCategory(?string $category): self
    {
        $this->category = $category;
        return $this;
    }
    public function setResponsibleEmployee(?string $responsibleEmployee): self
    {
        $this->responsibleEmployee = $responsibleEmployee;
        return $this;
    }
}