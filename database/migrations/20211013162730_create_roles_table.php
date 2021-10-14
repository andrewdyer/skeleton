<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreateRolesTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('roles');
    }

    public function up(): void
    {
        $this->getSchema()->create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
}
