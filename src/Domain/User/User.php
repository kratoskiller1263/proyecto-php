<?php
namespace App\Domain\User;

use DateTimeImmutable;

class User
{
    private UserId $id;
    private Name $name;
    private Email $email;
    private Password $password;
    private DateTimeImmutable $createdAt;

    public function __construct(UserId $id, Name $name, Email $email, Password $password, DateTimeImmutable $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt;
    }

    // Getters
    public function getId(): UserId { return $this->id; }
    public function getName(): Name { return $this->name; }
    public function getEmail(): Email { return $this->email; }
    public function getPassword(): Password { return $this->password; }
    public function getCreatedAt(): DateTimeImmutable { return $this->createdAt; }

    // Factory method to ensure immutability and proper creation
    public static function create(Name $name, Email $email, Password $password): self
    {
        $id = UserId::generate(); // Generate unique UserId
        $createdAt = new DateTimeImmutable(); // Set current date and time
        return new self($id, $name, $email, $password, $createdAt);
    }
}
