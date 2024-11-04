<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Migracioon practica laravel 05. Tabla de computadoras
     */
    public function up(): void
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('mark');
            $table->integer('size');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->timestamp('published_at')->nullable();; //campo extra
            $table->boolean('is_active');      //campo extra
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
