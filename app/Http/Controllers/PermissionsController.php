<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PermissionsController extends Controller
{
    public function list(Request $request, Response $response): Response
    {
        $permissions = Permission::all();

        return $response->withJson($permissions);
    }

    public function show(Request $request, Response $response, int $permissionId): Response
    {
        $permission = Permission::findOrFail($permissionId);

        return $response->withJson($permission);
    }
}
