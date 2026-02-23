<?php
namespace app\useCase\User;

use App\Services\UserService;
use Illuminate\Support\Collection;

class IndexUserUseCase
{
    public function __construct(
        private UserService $service,
    ) {
        //
    }

    public function execute(): Collection
    {
        return $this->service->index();
    }
}