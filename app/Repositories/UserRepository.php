<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function findById($id): User
    {
        return User::where('id', $id)->first();
    }


}