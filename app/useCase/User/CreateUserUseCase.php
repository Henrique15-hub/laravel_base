<?php
namespace app\useCase\User;

use App\Models\User;
use App\Services\UserService;

class CreateUserUseCase
{
    public function __construct(
        private UserService $service,
    ) {
        //
    }

    public function execute($validatedData): User
    {
        return $this->service->store($validatedData);
    }
}
