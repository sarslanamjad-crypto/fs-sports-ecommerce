<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Sports Equipment',
            'Clothing',
            'Footwear',
            'Accessories',
            'Electronics',
            'Bags',
            'Health & Fitness',
            'Outdoor',
            'Team Sports',
            'Water Sports',
            'Winter Sports',
            'Training Gear'
        ];

        foreach ($categories as $categoryName) {
            Category::firstOrCreate(
                ['slug' => Str::slug($categoryName)],
                [
                    'category_name' => $categoryName,
                    'slug' => Str::slug($categoryName),
                    'is_active' => true
                ]
            );
        }
    }
}
