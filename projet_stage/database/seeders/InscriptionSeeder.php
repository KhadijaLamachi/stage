<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Utilisateur;
use App\Models\Evenement;
use App\Models\Inscription;


class InscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $utilisateur = Utilisateur::pluck('id');
        $evenement = Evenement::pluck('id');
        for ($i = 0; $i < 10; $i++) {
            Inscription::factory()->create([
                'utilisateur_id'=>$utilisateur->random(),
                'evenement_id'=>$evenement->random()
            ]);
        }
    }
}
