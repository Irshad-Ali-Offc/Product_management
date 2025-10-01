<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   $products = [

            [
                "name" => "Product A",
                "category" => "Electronics",
                "price" => 199.99,
                "in_stock" => true
            ],
            [
                "name" => "Product B",
                "category" => "Books",
                "price" => 29.99,
                "in_stock" => true
            ],
            [
                "name" => "Product C",
                "category" => "Electronics",
                "price" => 149.99,
                "in_stock" => false
            ],
            [
                "name" => "Product D",
                "category" => "Clothing",
                "price" => 49.99,
                "in_stock" => true
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
