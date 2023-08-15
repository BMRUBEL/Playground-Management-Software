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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->date('first_payment_date');
            $table->date('release_date')->nullable();
            $table->decimal('applied_amount', 10, 2);
            $table->decimal('total_payable', 10, 2)->nullable();
            $table->decimal('total_paid', 10, 2)->nullable();
            $table->decimal('late_payment_penalties', 10, 2);
            $table->text('attachment')->nullable();
            $table->integer('installment');
            $table->text('description')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('status', ['pending', 'approved', 'denied'])->default('pending');
            $table->date('approved_date')->nullable();
            $table->unsignedinteger('approved_by')->nullable();
            $table->unsignedinteger('created_by')->nullable();

            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('loan_product_id')->references('id')->on('loan_products')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_applications');
    }
};
