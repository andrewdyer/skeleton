<?php

namespace App\Commands;

use App\Models\User;

class UpdateUserCommand
{
    private $data;

    private $user;

    public function __construct(User $user, array $data)
    {
        $this->data = $data;
        $this->user = $user;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
