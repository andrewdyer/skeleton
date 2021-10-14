<?php

namespace App\Handlers;

use App\Commands\CreateUserCommand;
use App\Models\User;
use Illuminate\Support\Arr;

class CreateUserHandler
{
    public function handle(CreateUserCommand $command): User
    {
        $data = $command->getData();

        $user = new User();
        $user->email = Arr::get($data, 'email');
        $user->first_name = Arr::get($data, 'first_name');
        $user->last_name = Arr::get($data, 'last_name');
        $user->password = password_hash(Arr::get($data, 'password'), PASSWORD_DEFAULT);
        $user->save();

        return $user;
    }
}
