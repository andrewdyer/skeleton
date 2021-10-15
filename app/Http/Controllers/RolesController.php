<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RolesController extends Controller
{
    public function list(Request $request, Response $response): Response
    {
        $roles = Role::all();

        return $response->withJson($roles);
    }
}
