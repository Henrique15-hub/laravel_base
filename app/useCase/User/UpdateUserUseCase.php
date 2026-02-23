<?php
namespace app\useCase\User;

use App\Repositories\UserRepository;
use App\Services\UserService;
class UpdateUserUseCase
{
    public function __construct(
        private UserService $service,
        private UserRepository $repo,
    ) {
        //
    }

    public function execute($validatedData, $userId)
    {
        $user = $this->repo->findById($userId);

        return $this->service->update($validatedData, $user);
    }
}
