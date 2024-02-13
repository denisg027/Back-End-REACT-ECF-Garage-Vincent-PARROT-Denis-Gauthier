<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "contact", indexes: [new ORM\Index(name: "car_id", columns: ["subject"])])]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "user_id", type: "integer")]
    private ?int $userId = null;

    #[ORM\Column(name: "lastname", type: "string", length: 100)]
    private ?string $lastname = null;

    #[ORM\Column(name: "firstname", type: "string", length: 100)]
    private ?string $firstname = null;

    #[ORM\Column(name: "email", type: "string", length: 255)]
    private ?string $email = null;

    #[ORM\Column(name: "phone", type: "string", length: 15)]
    private ?string $phone = null;

    #[ORM\Column(name: "message", type: "text")]
    private ?string $message = null;

    #[ORM\Column(name: "subject", type: "string", length: 255)]
    private ?string $subject = null;

    // Getters and setters...
}