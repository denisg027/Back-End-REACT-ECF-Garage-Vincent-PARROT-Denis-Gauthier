<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: "schedules")]
class Schedules
{
    #[ORM\Id]
    #[ORM\Column(name: "id", type: "integer")]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    private ?int $id = null;

    #[ORM\Column(name: "weekday", type: "string", length: 255)]
    private string $weekday;

    #[ORM\Column(name: "opening_time", type: "datetime")]
    private \DateTime $openingTime;

    #[ORM\Column(name: "closing_time", type: "datetime")]
    private \DateTime $closingTime;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeekday(): string
    {
        return $this->weekday;
    }

    public function setWeekday(string $weekday): self
    {
        $this->weekday = $weekday;
        return $this;
    }

    public function getOpeningTime(): \DateTime
    {
        return $this->openingTime;
    }

    public function setOpeningTime(\DateTime $openingTime): self
    {
        $this->openingTime = $openingTime;
        return $this;
    }

    public function getClosingTime(): \DateTime
    {
        return $this->closingTime;
    }

    public function setClosingTime(\DateTime $closingTime): self
    {
        $this->closingTime = $closingTime;
        return $this;
    }
}