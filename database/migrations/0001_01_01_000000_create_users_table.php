<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // INT AUTO_INCREMENT
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->enum('role', ['customer','admin']);
            // opsional: $table->timestamps(); // tidak ada di dump, jadi skip agar 1:1
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
