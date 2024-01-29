<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Elettronica', 'informatica', 'Telefonia', 'Moda-uomo', 'Moda-donna', 'Moda-bambino', 'Moda-bambina', 'Prima-infanzia', 'Casa e cucina', 'Giochi', 'Giocattoli', 'Musica'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
