<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "services")]
class Services
{
    #[ORM\Id]
    #[ORM\Column(name: "id", type: "integer")]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id = null;

    #[ORM\Column(name: "service_name", type: "string", length: 100)]
    private string $serviceName;

    #[ORM\Column(name: "service_description", type: "text")]
    private string $serviceDescription;

    #[ORM\Column(name: "service_picture", type: "string", length: 255)]
    private string $servicePicture;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    public function setServiceName(string $serviceName): self
    {
        $this->serviceName = $serviceName;
        return $this;
    }

    public function getServiceDescription(): string
    {
        return $this->serviceDescription;
    }

    public function setServiceDescription(string $serviceDescription): self
    {
        $this->serviceDescription = $serviceDescription;
        return $this;
    }

    public function getServicePicture(): string
    {
        return $this->servicePicture;
    }

    public function setServicePicture(string $servicePicture): self
    {
        $this->servicePicture = $servicePicture;
        return $this;
    }
}