<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('photo', 255);
            $table->text('bio');
        });
    }

    public function down(): void {
        Schema::dropIfExists('authors');
    }
};
