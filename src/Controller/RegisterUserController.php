<?php
namespace App\Controller;

use App\Application\UseCase\RegisterUserUseCase;
use App\Application\DTO\RegisterUserRequest;
use App\Application\DTO\UserResponseDTO;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class RegisterUserController
{
    private RegisterUserUseCase $registerUserUseCase;

    public function __construct(RegisterUserUseCase $registerUserUseCase)
    {
        $this->registerUserUseCase = $registerUserUseCase;
    }

    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $dto = new RegisterUserRequest($data['name'], $data['email'], $data['password']);
        
        try {
            $this->registerUserUseCase->execute($dto);
            return new JsonResponse(new UserResponseDTO($dto->getName(), $dto->getEmail()), 201);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }
    }
}
