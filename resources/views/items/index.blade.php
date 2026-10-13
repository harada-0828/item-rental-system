@extends('layouts.app')

@section('title', '備品一覧 - 備品貸出管理システム')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">備品一覧</h1>
    </div>

    <!-- 備品カードグリッド表示 -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($items as $item)
            <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden flex flex-col justify-between hover:shadow-md transition">
                <div class="p-5">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-50 text-blue-600">
                            {{ $item->category->name ?? 'カテゴリなし' }}
                        </span>
                        <span class="text-xs font-medium px-2 py-0.5 rounded {{ $item->status === 'available' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                            {{ $item->status === 'available' ? '貸出可能' : '貸出中' }}
                        </span>
                    </div>

                    <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $item->name }}</h2>
                    <p class="text-sm text-gray-600 line-clamp-2 mb-4">
                        {{ $item->description ?? '説明なし' }}
                    </p>
                </div>

                <div class="p-4 bg-gray-50 border-t border-gray-100 text-right">
                    <a href="#" class="inline-block text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        詳細を見る
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white p-8 text-center rounded-lg border border-gray-200 text-gray-500">
                登録されている備品がありません。
            </div>
        @endforelse
    </div>
</div>
@endsection