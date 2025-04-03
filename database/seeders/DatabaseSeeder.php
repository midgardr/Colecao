<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Prateleira;
use App\Models\Colecao;
use App\Models\Figura;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(50)->create();
        /*User::factory()->create([
            'name' => 'Ricardo',
            'email' => 'ricardoatila@email.com',
            'password' => bcrypt('12345'),
        ]);*/
        //Colecao::factory(10)->create();
        //Categoria::factory(50)->create();
        //Prateleira::factory(50)->create();
        Figura::factory(200)->create();
    }
}
