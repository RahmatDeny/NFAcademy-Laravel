<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('cover_photo', 255);

            $table->unsignedInteger('genre_id');
            $table->unsignedInteger('author_id');

            $table->index('genre_id');
            $table->index('author_id');

            $table->foreign('genre_id')->references('id')->on('genres')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('author_id')->references('id')->on('authors')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    public function down(): void {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['author_id']);
        });
        Schema::dropIfExists('books');
    }
};
