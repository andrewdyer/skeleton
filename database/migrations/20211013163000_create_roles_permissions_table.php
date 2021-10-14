<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateRolesPermissionsTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('roles_permissions');
    }

    public function up(): void
    {
        $this->getSchema()->create('roles_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('permission_id');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
