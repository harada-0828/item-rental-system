<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            // 外部キー（users.id & items.id）
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();
            $table->date('rental_date');
            $table->date('return_due_date');
            $table->date('returned_date')->nullable();
            // 貸出ステータス（renting: 貸出中, applying_return: 返却申請中, returned: 返却済み）
            $table->string('status')->default('renting');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};