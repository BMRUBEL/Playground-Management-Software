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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->char('name', 50);
            $table->enum('status', ['pending', 'approved', 'denied'])->default('pending');
            $table->string('email')->unique()->nullable();
            $table->char('mobile', 50)->nullable();
            $table->char('business_name', 100)->nullable();
            $table->char('member_no', 50)->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->default('male');
            $table->char('city', 191)->nullable();
            $table->text('address')->nullable();
            $table->char('credit_source', 191)->nullable();
            $table->char('photo', 191)->nullable();
            $table->char('nid', 191)->nullable();
            $table->char('birth_certificate', 191)->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('branch_id')->references('id')->on('branches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('guaranter_id')->references('id')->on('guaranters')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
