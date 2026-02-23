<?php
namespace app\useCase\User;

use App\Repositories\UserRepository;
use App\Services\UserService;
class DestroyUSerUseCase
{
    public function __construct(
        private UserService $service,
        private UserRepository $repo,
    ) {
        //
    }

    public function execute($userId)
    {
        $user = $this->repo->findById($userId);

        return $this->service->destroy($user);
    }
}
