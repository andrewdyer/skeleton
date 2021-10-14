<?php

namespace App\Handlers;

use App\Commands\UpdateUserCommand;
use App\Models\User;
use Illuminate\Support\Arr;

class UpdateUserHandler
{
    public function handle(UpdateUserCommand $command): User
    {
        $user = $command->getUser();
        $data = $command->getData();

        if ($email = Arr::get($data, 'email')) {
            $user->email = $email;
        }

        if ($firstName = Arr::get($data, 'first_name')) {
            $user->first_name = $firstName;
        }

        if ($lastName = Arr::get($data, 'last_name')) {
            $user->last_name = $lastName;
        }

        if ($password = Arr::get($data, 'password')) {
            $user->password = password_hash($password, PASSWORD_DEFAULT);
        }

        $user->save();

        return $user;
    }
}
