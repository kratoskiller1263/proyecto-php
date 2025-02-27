<?php
namespace App\Domain\User;

class Password
{
    private string $password;

    public function __construct(string $password)
    {
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[\W_]/', $password)) {
            throw new WeakPasswordException('La contraseña no cumple con los requisitos de seguridad');
        }
        $this->password = password_hash($password, PASSWORD_BCRYPT); // Almacenamiento seguro de la contraseña
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

