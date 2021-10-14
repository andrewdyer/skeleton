<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UsersController extends Controller
{
    public function create(Request $request, Response $response): Response
    {
        $data = $request->getParsedBody();

        $user = new User();
        $user->email = Arr::get($data, 'email');
        $user->first_name = Arr::get($data, 'first_name');
        $user->last_name = Arr::get($data, 'last_name');
        $user->password = password_hash(Arr::get($data, 'password'), PASSWORD_DEFAULT);
        $user->save();

        return $response->withJson($user, 201);
    }

    public function delete(Request $request, Response $response, int $userId): Response
    {
        $user = User::findOrFail($userId);
        $user->delete();

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

        $data = $request->getParsedBody();

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

        return $response->withJson($user);
    }
}
