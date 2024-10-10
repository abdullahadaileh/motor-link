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
            $table->unsignedBigInteger('owner_id')->nullable(); 
            $table->string('make');
            $table->string('model');
            $table->string('image')->nullable();
            $table->year('year');
            $table->enum('type', [
                'Economical car', 'Jeep car', 'Luxury car', 'Pickup Truck',
                'Sport car', 'SUV', 'Hatchback', 'Sedan', 'Minivan',
                'Crossover', 'Coupe', 'Convertible', 'Station Wagon',
                'Electric car', 'Hybrid car'
            ]);
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
