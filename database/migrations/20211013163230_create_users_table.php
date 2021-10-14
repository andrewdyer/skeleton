<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateUsersTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('users');
    }

    public function up(): void
    {
        $this->getSchema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->timestamps();
        });
    }
}
