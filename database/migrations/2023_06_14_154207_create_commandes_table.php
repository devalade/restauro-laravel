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
            $table->bigInteger('serveur_id')->unsigned();
            $table->bigInteger('statut_commande_id')->unsigned();
            $table->bigInteger('paiemment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('table_id')->unsigned();
            $table->timestamps();
            $table->foreign('serveur_id')->references('id')->on('serveurs')->onDelete('cascade');
            $table->foreign('statut_commande_id')->references('id')->on('statut_commandes')->onDelete('cascade');
            $table->foreign('paiemment_id')->references('id')->on('paiemments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
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
