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

    // Utilisation d'un champ JSON pour les rôles permet une flexibilité future
    #[ORM\Column(type: "json")]
    private array $roles = [];

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $createdAt;

    // Attribut pour le mot de passe en clair non persisté
    private ?string $plainPassword = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        // Définir un rôle par défaut
        $this->roles = ['ROLE_USER'];
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getPhoneId(): ?string
    {
        return $this->phoneId;
    }

    public function setPhoneId(string $phoneId): self
    {
        $this->phoneId = $phoneId;
        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function getRoles(): array
    {
        // Retourne le tableau des rôles
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    public function getSalt()
    {
        // Non nécessaire si vous utilisez bcrypt ou argon2i
        return null;
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function eraseCredentials(): void
    {
        // Efface le mot de passe en clair après l'authentification
        $this->plainPassword = null;
    }
}