<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. ログインしており、かつ role が 'admin'（管理者）であるか判定
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // 管理者ならそのまま通す
        }

        // 2. 管理者でなければ、一般の備品一覧ページ（またはエラー画面）へリダイレクトして追い返す
        return redirect()->route('items.index')->with('error', '管理者権限がありません。');
    }
}