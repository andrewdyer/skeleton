<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateUsersPermissionsTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('users_permissions');
    }

    public function up(): void
    {
        $this->getSchema()->create('users_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('permission_id');
            $table->timestamps();

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
