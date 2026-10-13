<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '備品貸出管理システム')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col font-sans">

    <!-- ヘッダー / ナビゲーションバー -->
    <header class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-6">
                <a href="{{ route('items.index') }}" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition">
                    備品貸出管理システム
                </a>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                    <!-- ログイン中の表示 -->
                    <span class="text-sm text-gray-600">
                        ようこそ、<strong class="text-gray-800">{{ Auth::user()->name }}</strong> 様
                        @if(Auth::user()->role === 'admin')
                            <span class="ml-1 bg-red-100 text-red-700 text-xs px-2 py-0.5 rounded font-semibold">管理者</span>
                        @endif
                    </span>

                    <!-- ログアウトフォーム -->
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-red-600 transition">
                            ログアウト
                        </button>
                    </form>
                @else
                    <!-- ゲスト時の表示 -->
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-blue-600">ログイン</a>
                    <a href="{{ route('register') }}" class="text-sm bg-blue-600 text-white px-3 py-1.5 rounded-md hover:bg-blue-700 transition">会員登録</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- メインコンテンツ領域 -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- フラッシュメッセージ（成功時など） -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- フッター -->
    <footer class="bg-white border-t border-gray-200 py-4 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} 備品貸出管理システム All Rights Reserved.
    </footer>

</body>
</html>