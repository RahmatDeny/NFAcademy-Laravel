<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number', 255)->unique();

            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('book_id');
            $table->decimal('total_amount', 10, 2);

            $table->index('customer_id');
            $table->index('book_id');

            $table->foreign('customer_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('book_id')->references('id')->on('books')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    public function down(): void {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['book_id']);
        });
        Schema::dropIfExists('transactions');
    }
};
