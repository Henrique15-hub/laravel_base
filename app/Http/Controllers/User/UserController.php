<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\UserService;
use app\useCase\User\CreateUserUseCase;
use app\useCase\User\DestroyUserUseCase;
use app\useCase\User\IndexUserUseCase;
use app\useCase\User\UpdateUserUseCase;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service,
        private CreateUserUseCase $createUseruseCase,
        private UpdateUserUseCase $updateUserUseCase,
        private DestroyUserUseCase $destroyUserUseCase,
        private IndexUserUseCase $indexUserUseCase,
    ) {
        //
    }

    public function index(): JsonResponse
    {
        $users = $this->indexUserUseCase->execute();

        return response()->json([
            'message' => 'Showing all users',
            'users' => $users
        ]);
    }
    public function store(UserStoreRequest $request): JsonResponse
    {
        $user = $this->createUseruseCase->execute($request->validated());

        return response()->json([
            'message' => 'user created successfully',
            'user' => $user
        ], 201);
    }

    public function update(UserUpdateRequest $request): JsonResponse
    {
        $user = $this->updateUserUseCase->execute($request->validated(), auth()->id());

        return response()->json([
            'message' => 'user updated successfully',
            'user' => $user
        ]);
    }

    public function destroy(): JsonResponse
    {
        $this->destroyUserUseCase->execute(auth()->id());

        return response()->json([
            'message' => 'user deleted successfully',
        ]);
    }

}