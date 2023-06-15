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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_table');
            $table->integer('capacite');
            $table->bigInteger('statut_table_id')->unsigned();
            $table->foreignId('created_by')->references('id')->on('users');
            $table->timestamps();
            $table->foreign('statut_table_id')->references('id')->on('statut_tables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
