<?php

use App\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

final class CreatePermissionsTable extends Migration
{
    public function down(): void
    {
        $this->getSchema()->drop('permissions');
    }

    public function up(): void
    {
        $this->getSchema()->create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }
}
