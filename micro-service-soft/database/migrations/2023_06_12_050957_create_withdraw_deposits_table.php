<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('withdraw_deposits', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->enum('status', ['pending', 'approved', 'release'])->default('pending');
        
            $table->foreignId('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreignId('deposit_id')->references('id')->on('deposits')->onDelete('cascade')->onUpdate('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraw_deposits');
    }
};
