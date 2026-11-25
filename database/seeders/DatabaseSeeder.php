<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Création du compte Administrateur pour la gestion des espaces personnels
        User::firstOrCreate(
            ['email' => 'admin@terramoi.fr'],
            [
                'name' => 'Administrateur',
                'password' => Hash::make('admin1234'),
                'role' => 'admin',
            ]
        );
    }
}
