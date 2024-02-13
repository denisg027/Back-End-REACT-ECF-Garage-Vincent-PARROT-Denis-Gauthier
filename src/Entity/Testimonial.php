<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "testimonial")]
class Testimonial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 100)]
    private string $name;

    #[ORM\Column(type: "string", length: 255)]
    private string $comment;

    #[ORM\Column(type: "integer")]
    private int $score;

    #[ORM\Column(name: "statusModeration", type: "text")]
    private string $statusModeration;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;
        return $this;
    }

    public function getStatusModeration(): string
    {
        return $this->statusModeration;
    }

    public function setStatusModeration(string $statusModeration): self
    {
        $this->statusModeration = $statusModeration;
        return $this;
    }
}