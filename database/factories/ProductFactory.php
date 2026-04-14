<?php

namespace Database\Factories;
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
            ["iPhone 15 Pro", "Apple", "Smartproduct", "Phone", 499.99],
            ["iPhone 14", "Apple", "Smartproduct", "Phone", 399.99],
            ["Samsung Galaxy S24", "Samsung", "Smartproduct", "Phone", 3499.99],
            ["Samsung Galaxy S23", "Samsung", "Smartproduct", "Phone", 2999.99],
            ["Xiaomi 13", "Xiaomi", "Smartproduct", "Phone", 2499.99],
            ["Xiaomi 12", "Xiaomi", "Smartproduct", "Phone", 1999.99],
            ["Google Pixel 8", "Google", "Smartproduct", "Phone", 3499.99],
            ["Google Pixel 9a", "Google", "Smartproduct", "Phone", 2799.99],
            ["OnePlus 12", "OnePlus", "Smartproduct", "Phone", 2799.99],
            ["OnePlus 11", "OnePlus", "Smartproduct", "Phone", 1999.99],

            // Laptops
            ["MacBook Air M2", "Apple", "Smartproduct", "Laptop", 5999.99],
            ["MacBook Pro M2", "Apple", "Smartproduct", "Laptop", 8999.99],
            ["Lenovo Legion 5", "Lenovo", "Smartproduct", "Laptop", 4299.99],
            ["ASUS ZenBook 14", "ASUS", "Smartproduct", "Laptop", 3799.99],
            ["Dell XPS 13", "Dell", "Smartproduct", "Laptop", 6499.99],
            ["HP Spectre x360", "HP", "Smartproduct", "Laptop", 5999.99],
            ["ASUS ROG Strix G15", "ASUS", "Smartproduct", "Laptop", 5199.99],
            ["Lenovo ThinkPad X1", "Lenovo", "Smartproduct", "Laptop", 6499.99],
            ["HP Pavilion 15", "HP", "Smartproduct", "Laptop", 3999.99],
            ["Dell Inspiron 16", "Dell", "Smartproduct", "Laptop", 4499.99],

            // Gaming
            ["PlayStation 5", "Sony", "Gaming", "Console", 2199.99],
            ["PlayStation 4 Pro", "Sony", "Gaming", "Console", 1299.99],
            ["Xbox Series X", "Microsoft", "Gaming", "Console", 1999.99],
            ["Xbox One X", "Microsoft", "Gaming", "Console", 1199.99],
            ["Nintendo Switch OLED", "Nintendo", "Gaming", "HandholdConsole", 1599.99],
            ["Nintendo Switch Lite", "Nintendo", "Gaming", "HandholdConsole", 999.99],
            ["Steam Deck", "Valve", "Gaming", "HandholdConsole", 1799.99],
            ["PlayStation VR2", "Sony", "Gaming", "VR", 899.99],
            ["Xbox Wireless Controller", "Microsoft", "Gaming", "Controller", 249.99],
            ["Nintendo Pro Controller", "Nintendo", "Gaming", "Controller", 299.99],

            // PC Components
            ["RTX 4070", "NVIDIA", "Components", "GPU", 2999.99],
            ["RTX 5060", "NVIDIA", "Components", "GPU", 4999.99],
            ["RTX 4090", "NVIDIA", "Components", "GPU", 8999.99],
            ["Ryzen 7 5800X", "AMD", "Components", "CPU", 1499.99],
            ["Ryzen 9 5900X", "AMD", "Components",  "CPU",2499.99],
            ["Intel i7-13700K", "Intel", "Components", "CPU", 1899.99],
            ["Intel i9-13900K", "Intel", "Components", "CPU", 2799.99],
            ["Samsung 1TB SSD", "Samsung", "Components", "Storage", 449.99],
            ["Corsair 16GB RAM", "Corsair", "Components", "RAM", 399.99],
            ["Kingston 32GB RAM", "Kingston", "Components", "RAM", 799.99],

            // Accessories
            ["Logitech G Pro X Mouse", "Logitech", "Accessories", "Mouse", 299.99],
            ["Razer BlackWidow V3", "Razer", "Accessories", "Keyboard", 499.99],
            ["Apple Magic Keyboard", "Apple", "Accessories", "Keyboard", 499.99],
            ["Samsung Wireless Charger", "Samsung", "Accessories", "Charger", 149.99],
            ["Corsair K95 Keyboard", "Corsair", "Accessories", "Keyboard", 599.99],
            ["Razer DeathAdder V3", "Razer", "Accessories", "Mouse", 399.99],
            ["Logitech C920 Webcam", "Logitech", "Accessories", "Webcam", 249.99],
            ["SteelSeries QcK Mousepad", "SteelSeries", "Accessories", "Mousepad", 99.99],

            // TVs
            ["Samsung 55\" 4K Smart TV", "Samsung", "Household", "Television", 2499.99],
            ["LG OLED C2 65\"", "LG", "Household", "Television", 6999.99],
            ["Bosch Serie 6 Mosógép", "Bosch", "Household", "WashingMachine", 1899.99],
            ["Whirlpool Mosogatógép", "Whirlpool", "Household", "Dishwasher", 1599.99],
            ["Electrolux Hűtőszekrény", "Electrolux", "Household", "Refrigerator", 2799.99],
            ["Samsung Side-by-Side Hűtő", "Samsung", "Household", "Refrigerator", 3499.99],
            ["Bosch Beépíthető Sütő", "Bosch", "Household", "Oven", 1299.99],
            ["Whirlpool Elektromos Sütő", "Whirlpool", "Household", "Oven", 1099.99],
            ["Rowenta Porszívó", "Rowenta", "Household", "VacuumCleaner", 699.99],
            ["Dyson V11 porszívó", "Dyson", "Household", "VacuumCleaner", 2499.99],

            // Audio
            ["Sony WH-1000XM5", "Sony", "Audio", "Headphone", 1499.99],
            ["AirPods Pro 2", "Apple", "Audio", "Earphone", 999.99],
            ["Sony Extra Bass Headphones", "Sony", "Audio", "Headphone", 349.99],
            ["SteelSeries Arctis 7", "SteelSeries", "Audio", "Headphone", 699.99],
            ["Bose QuietComfort 45", "Bose", "Audio", "Headphone", 1299.99],
            ["JBL Charge 5", "JBL", "Audio", "Speaker", 149.99],
            ["Logitech Z623", "Logitech", "Audio", "Speaker", 699.99],
            ["Sony SRS-XB43", "Sony", "Audio", "Speaker", 449.99],
            ["Bose SoundLink Revolve", "Bose", "Audio", "Speaker", 699.99],
            ["JBL Flip 6", "JBL", "Audio", "Speaker", 399.99],
            ["Apple HomePod Mini", "Apple", "Audio", "Speaker", 599.99],
            ["Sony HT-G700 Soundbar", "Sony", "Audio", "Speaker", 1299.99],
        ];

        $product = $this->faker->randomElement($products);
        [$name, $brandName, $category, $type, $price] = $product;
        
        $imageName = \Illuminate\Support\Str::slug($name, '_') . ".png";
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
            "category" => $category,
            "brandname" => $brandName,
            "type" => $type,
        ];
    }
}
