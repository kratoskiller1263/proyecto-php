<?php
namespace App\Domain\User;

class Password
{
    private string $password;

    public function __construct(string $password)
    {
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W_]/', $password)) {
            throw new WeakPasswordException('Contraseña débil');
        }

        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function verify(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
