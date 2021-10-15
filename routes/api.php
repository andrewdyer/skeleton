<?php

$app->group('/api/v1', function () {
    $this->group('/permissions', function () {
        $this->get('/{permission_id}', App\Http\Controllers\PermissionsController::class . ':show');
        $this->get('', App\Http\Controllers\PermissionsController::class . ':list');
    });

    $this->group('/roles', function () {
        $this->get('/{role_id}', App\Http\Controllers\RolesController::class . ':show');
        $this->get('', App\Http\Controllers\RolesController::class . ':list');
    });

    $this->group('/users', function () {
        $this->group('/{user_id}', function () {
            $this->delete('', App\Http\Controllers\UsersController::class . ':delete');
            $this->get('', App\Http\Controllers\UsersController::class . ':show');
            $this->patch('', App\Http\Controllers\UsersController::class . ':update');
        });
        $this->get('', App\Http\Controllers\UsersController::class . ':list');
        $this->post('', App\Http\Controllers\UsersController::class . ':create');
    });
});
