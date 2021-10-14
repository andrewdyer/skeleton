<?php

namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Commands\DeleteUserCommand;
use App\Commands\UpdateUserCommand;
use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController extends Controller
{
    public function create(Request $request, Response $response): Response
    {
        $user = $this->getCommandBus()->handle(new CreateUserCommand($request->getParsedBody()));

        return $response->withJson($user, 201);
    }

    public function delete(Request $request, Response $response, int $userId): Response
    {
        $user = User::findOrFail($userId);

        $this->getCommandBus()->handle(new DeleteUserCommand($user));

        return $response->withStatus(204);
    }

    public function list(Request $request, Response $response): Response
    {
        $users = User::all();

        return $response->withJson($users);
    }

    public function show(Request $request, Response $response, int $userId): Response
    {
        $user = User::findOrFail($userId);

        return $response->withJson($user);
    }

    public function update(Request $request, Response $response, int $userId): Response
    {
        $user = User::findOrFail($userId);

        $user = $this->getCommandBus()->handle(new UpdateUserCommand($user, $request->getParsedBody()));

        return $response->withJson($user);
    }
}
