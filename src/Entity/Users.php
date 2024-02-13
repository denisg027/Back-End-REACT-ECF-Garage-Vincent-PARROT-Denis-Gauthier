<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity]
#[ORM\Table(name: "users", uniqueConstraints: [
    new ORM\UniqueConstraint(name: "email_unique", columns: ["email"]),
    new ORM\UniqueConstraint(name: "phone_id_unique", columns: ["phone_id"])
])]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $userId = null;

    #[ORM\Column(type: "string", length: 50)]
    private string $lastname;

    #[ORM\Column(type: "string", length: 50)]
    private string $firstname;

    #[ORM\Column(type: "string", length: 100, unique: true)]
    private string $email;

    #[ORM\Column(type: "string", length: 20)]
    private string $phoneId;

    #[ORM\Column(type: "string", length: 255)]
    private string $password;

    #[ORM\Column(type: "string", length: 20, nullable: true, options: ["default" => "ROLE_USER"])]
    private ?string $role = 'ROLE_USER';

    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private \DateTimeInterface $createdAt;

    // Implementations of UserInterface and PasswordAuthenticatedUserInterface methods

    public function getRoles(): array
    {
        return [$this->role];
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    private $plainPassword;

    public function eraseCredentials(): void
    {
        // Efface le mot de passe en clair après l'authentification
        $this->plainPassword = null;
    }
}