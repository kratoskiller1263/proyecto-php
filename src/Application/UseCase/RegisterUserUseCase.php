<?php
namespace App\Application\UseCase;

use App\Domain\User\UserRepositoryInterface;
use App\Domain\User\User;
use App\Domain\User\Email;
use App\Domain\User\Password;
use App\Application\DTO\RegisterUserRequest;
use App\Application\Events\UserRegisteredEvent;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(UserRepositoryInterface $userRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function execute(RegisterUserRequest $request): void
    {
        // Validar si el email ya está en uso
        if ($this->userRepository->findByEmail($request->getEmail())) {
            throw new UserAlreadyExistsException("El email ya está en uso");
        }

        // Crear el usuario
        $user = new User(
            new UserId(),
            new Name($request->getName()),
            new Email($request->getEmail()),
            new Password($request->getPassword()),
            new DateTimeImmutable()
        );

        // Guardar el usuario
        $this->userRepository->save($user);

        // Disparar evento
        $this->eventDispatcher->dispatch(new UserRegisteredEvent($user));
    }
}
