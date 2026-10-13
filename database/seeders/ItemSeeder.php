<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'category_id' => 1,
                'name' => 'MacBook Pro 14インチ',
                'description' => '開発用ノートPC（M2 Air/Pro）',
                'status' => 'available',
            ],
            [
                'category_id' => 1,
                'name' => '27インチ 4Kモニター',
                'description' => 'Dell 4K外部ディスプレイ',
                'status' => 'available',
            ],
            [
                'category_id' => 2,
                'name' => 'iPad Air',
                'description' => '検証用タブレット（第5世代）',
                'status' => 'available',
            ],
            [
                'category_id' => 3,
                'name' => 'モバイルプロジェクター',
                'description' => '会議室・プレゼン用',
                'status' => 'available',
            ],
            [
                'category_id' => 4,
                'name' => 'レーザーポインター',
                'description' => 'プレゼン用ポインター',
                'status' => 'available',
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}