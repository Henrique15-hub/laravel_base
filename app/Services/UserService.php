<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    public function index(): Collection
    {
        $users = User::all();

        return $users;
    }

    public function store($validatedData): User
    {
        return User::create($validatedData);
    }


    public function update($validatedData, $user)
    {
        $user->update($validatedData);

        return $user->fresh();
    }

    public function destroy($user)
    {
        return $user->delete();
    }

}
