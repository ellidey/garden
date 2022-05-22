<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    const categories = [
        'Товары для теплиц',
        'Полив',
        'Товары для детей',
        'Хранение',
        'Товары для дома',
        'Товары для кухни',
        'Товары для садовода',
        'Напольные покрытия',
        'Прочее',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
