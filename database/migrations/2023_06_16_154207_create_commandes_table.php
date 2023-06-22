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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->decimal('prix_total')->default(0);
            $table->decimal('total_recu')->default(0);
            $table->foreignId('serveur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('statut_commande_id')->references('id')->on('statut_commandes')->onDelete('cascade');
            $table->foreignId('paiemment_id')->references('id')->on('paiemments')->onDelete('cascade');
            $table->foreignId('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreignId('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreignId('plat_id')->references('id')->on('plats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
