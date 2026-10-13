<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 管理者ユーザーの作成
        User::create([
            'name' => '管理者太郎',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 一般ユーザーの作成
        User::create([
            'name' => 'テスト一郎',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // カテゴリと備品シーダーの実行
        $this->call([
            CategorySeeder::class,
            ItemSeeder::class,
        ]);
    }
}