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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id'); 
            $table->string('make');
            $table->string('model');
            $table->year('year');
            $table->string('type');
            $table->decimal('price_per_day', 10, 2);
            $table->string('fuel_type');
            $table->text('description')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
