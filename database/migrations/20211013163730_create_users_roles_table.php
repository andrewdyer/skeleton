<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateUsersRolesTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('users_roles');
    }

    public function up(): void
    {
        $this->getSchema()->create('users_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('role_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
