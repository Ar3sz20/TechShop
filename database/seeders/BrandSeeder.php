<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $brands = [
               "Apple",
            "Samsung",
            "ASUS",
            "Lenovo",
            "Sony",
            "LG",
            "Logitech",
            "Razer",
            "AMD",
            "Intel",
            "NVIDIA",
            "Microsoft",
            "Nintendo",
            "Valve",
            "Corsair",
            "Kingston",
            "Bose",
            "JBL",
            "Philips",
            "Panasonic",
            "HP",
            "Dell",
            "Google",
            "OnePlus",
            "Xiaomi",
            "SteelSeries"
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate(['name' => $brand]);
        }
    }
}
