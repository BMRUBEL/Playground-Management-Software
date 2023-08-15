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
        Schema::create('loan_payments', function (Blueprint $table) {
            $table->id();
            $table->date('paid_at');
            $table->decimal('late_penalties', 10, 2);
            $table->decimal('interest', 10, 2);
            $table->decimal('repayment_amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->text('remarks')->nullable();
            
            $table->foreignId('loan_application_id')->references('id')->on('loan_applications')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_payments');
    }
};
