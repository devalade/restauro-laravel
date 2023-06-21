<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        User::upsert([
//            [
//                'nom' => "MAGENGO",
//                'prenom' => "Gutembert",
//                'sexe' => "Masculin",
//                'contact' => "65263478",
//                'email' => "admin@gmail.com",
//                'password' => Hash::make("password"),
//            ],
//            [
//                'nom' => "MONTERO",
//                'prenom' => "Josephine",
//                'sexe' => "Feminin",
//                'contact' => "52484156",
//                'email' => "restaurant@gmail.com",
//                'password' => Hash::make("password"),
//            ],
//            [
//                'nom' => "AGONKE",
//                'prenom' => "Seraphin",
//                'sexe' => "Masculin",
//                'contact' => "63986525",
//                'email' => "client@gmail.com",
//                'password' => Hash::make("password"),
//            ]
//        ], ['email']);

    }
}
