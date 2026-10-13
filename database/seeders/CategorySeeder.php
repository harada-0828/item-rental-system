<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'PC・周辺機器',
            'モバイル端末',
            'プロジェクター・音響',
            '文房具・事務用品',
            'その他備品',
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}