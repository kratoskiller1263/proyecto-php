<?php
namespace App\Domain\User;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException('Email inválido');
        }
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
