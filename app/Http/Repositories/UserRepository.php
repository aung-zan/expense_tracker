<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Create a new user.
     *
     * @param array $data
     * @return App\Models\User
     */
    public function createUser($data): User
    {
        $user = $this->user->create($data);

        return $user;
    }

    /**
     * Update a user by id.
     */
    public function updateUser()
    {
        //
    }
}
