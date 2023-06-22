<?php

namespace Database\Seeders;

use App\Models\StatutCommande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatutCommande::upsert([
            [
                'code' => StatutCommande::EN_COURS,
                'libelle' => 'En cours'
            ],
            [
                'code' => StatutCommande::TRAITE,
                'libelle' => 'Traité'
            ],
            [
                'code' => StatutCommande::NON_TRAITE,
                'libelle' => 'Non traité'
            ]
        ], ['code']);
    }
}
