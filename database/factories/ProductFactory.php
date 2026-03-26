<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            // Phones
            ["iPhone 15 Pro", "Apple", "phone", 499999],
            ["iPhone 14", "Apple", "phone", 399999],
            ["Samsung Galaxy S24", "Samsung", "phone", 349999],
            ["Samsung Galaxy S23", "Samsung", "phone", 299999],
            ["Xiaomi 13", "Xiaomi", "phone", 249999],
            ["Xiaomi 12", "Xiaomi", "phone", 199999],
            ["Google Pixel 8", "Google", "phone", 349999],
            ["Google Pixel 9a", "Google", "phone", 279999],
            ["OnePlus 12", "OnePlus", "phone", 279999],
            ["OnePlus 11", "OnePlus", "phone", 199999],

            // Laptops
            ["MacBook Air M2", "Apple", "laptop", 599999],
            ["MacBook Pro M2", "Apple", "laptop", 899999],
            ["Lenovo Legion 5", "Lenovo", "laptop", 429999],
            ["ASUS ZenBook 14", "ASUS", "laptop", 379999],
            ["Dell XPS 13", "Dell", "laptop", 649999],
            ["HP Spectre x360", "HP", "laptop", 599999],
            ["ASUS ROG Strix G15", "ASUS", "laptop", 519999],
            ["Lenovo ThinkPad X1", "Lenovo", "laptop", 649999],
            ["HP Pavilion 15", "HP", "laptop", 399999],
            ["Dell Inspiron 16", "Dell", "laptop", 449999],

            // Gaming
            ["PlayStation 5", "Sony", "gaming", 219999],
            ["PlayStation 4 Pro", "Sony", "gaming", 129999],
            ["Xbox Series X", "Microsoft", "gaming", 199999],
            ["Xbox One X", "Microsoft", "gaming", 119999],
            ["Nintendo Switch OLED", "Nintendo", "gaming", 159999],
            ["Nintendo Switch Lite", "Nintendo", "gaming", 99999],
            ["Steam Deck", "Valve", "gaming", 179999],
            ["PlayStation VR2", "Sony", "gaming", 89999],
            ["Xbox Wireless Controller", "Microsoft", "gaming", 24999],
            ["Nintendo Pro Controller", "Nintendo", "gaming", 29999],

            // PC Components
            ["RTX 4070", "NVIDIA", "pc_components", 299999],
            ["RTX 5060", "NVIDIA", "pc_components", 499999],
            ["RTX 4090", "NVIDIA", "pc_components", 899999],
            ["Ryzen 7 5800X", "AMD", "pc_components", 149999],
            ["Ryzen 9 5900X", "AMD", "pc_components", 249999],
            ["Intel i7-13700K", "Intel", "pc_components", 189999],
            ["Intel i9-13900K", "Intel", "pc_components", 279999],
            ["Samsung 1TB SSD", "Samsung", "pc_components", 44999],
            ["Corsair 16GB RAM", "Corsair", "pc_components", 39999],
            ["Kingston 32GB RAM", "Kingston", "pc_components", 79999],

            // Accessories
            ["Logitech G Pro X Mouse", "Logitech", "accessories", 29999],
            ["Razer BlackWidow V3", "Razer", "accessories", 49999],
            ["SteelSeries Arctis 7", "SteelSeries", "accessories", 69999],
            ["Apple Magic Keyboard", "Apple", "accessories", 49999],
            ["Samsung Wireless Charger", "Samsung", "accessories", 14999],
            ["Sony Extra Bass Headphones", "Sony", "accessories", 34999],
            ["Corsair K95 Keyboard", "Corsair", "accessories", 59999],
            ["Razer DeathAdder V3", "Razer", "accessories", 39999],
            ["Logitech C920 Webcam", "Logitech", "accessories", 24999],
            ["SteelSeries QcK Mousepad", "SteelSeries", "accessories", 9999],

            // TVs
            ["Samsung 55\" 4K Smart TV", "Samsung", "tv", 249999],
            ["Samsung 65\" QLED TV", "Samsung", "tv", 399999],
            ["LG OLED C2 65\"", "LG", "tv", 699999],
            ["LG 55\" UHD TV", "LG", "tv", 319999],
            ["Sony 75\" Bravia", "Sony", "tv", 899999],
            ["Sony 55\" X90K", "Sony", "tv", 449999],
            ["Panasonic 65\" 4K TV", "Panasonic", "tv", 399999],
            ["Philips 55\" OLED TV", "Philips", "tv", 449999],
            ["Samsung 50\" LED TV", "Samsung", "tv", 199999],
            ["LG 65\" NanoCell", "LG", "tv", 549999],

            // Audio
            ["Sony WH-1000XM5", "Sony", "audio", 149999],
            ["AirPods Pro 2", "Apple", "audio", 99999],
            ["Bose QuietComfort 45", "Bose", "audio", 129999],
            ["JBL Charge 5", "JBL", "audio", 14999],
            ["Logitech Z623", "Logitech", "audio", 69999],
            ["Sony SRS-XB43", "Sony", "audio", 44999],
            ["Bose SoundLink Revolve", "Bose", "audio", 69999],
            ["JBL Flip 6", "JBL", "audio", 39999],
            ["Apple HomePod Mini", "Apple", "audio", 59999],
            ["Sony HT-G700 Soundbar", "Sony", "audio", 129999],
        ];

        $product = $this->faker->randomElement($products);
        [$name, $brandName, $categoryName, $price] = $product;
        
        $imageName = str_replace([' ', '"'], ['-', ''], strtolower($name)) . ".png";
        $imagePath = "images/products/" . $imageName;

        if (!file_exists(public_path($imagePath))) {
            $imagePath = "images/products/placeholder.png";
        }

        return [
            "name" => $name,
            "price" => $price,
            "description" => fake()->paragraph(3),
            "image" => $imagePath,
            "quantity" => fake()->numberBetween(0, 200),
            "category_id" => Category::where('name', $categoryName)->first()->id,
            "brand_id" => Brand::where('name', $brandName)->first()->id,
        ];
    }
}
