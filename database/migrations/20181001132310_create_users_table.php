<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('users');
    }

    public function up(): void
    {
        $this->getSchema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->text('password');
            $table->timestamps();
        });
    }
}
