<?php

namespace App\Handlers;

use App\Commands\DeleteUserCommand;

class DeleteUserHandler
{
    public function handle(DeleteUserCommand $command): void
    {
        $user = $command->getUser();

        $user->delete();
    }
}
