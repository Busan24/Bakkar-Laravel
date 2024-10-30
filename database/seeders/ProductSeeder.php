<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "Ayam ngenah",
            "description" => "Rasa ayam gagah dan bergizi",
            "price" => 10000,
            "photo" => "adadada",
            "category_id" => 1,
            "whatsapp" => "0829429424298",
        ]);
    }
} 
