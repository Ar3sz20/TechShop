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
            "name" => "telefon 99",
            "type" => "phone",
            "price" => 59.99,
            "category" => "smartproduct",
            "description" => "ez egy jó teló",
            "image" => "placeholde.png",
            "quantity" => 150
        ]);

        Product::factory(10)->create();
    }
}
