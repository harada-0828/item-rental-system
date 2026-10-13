<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    public function index()
    {

        $items = Item::all(); // データを取得する
        return view('items.index', compact('items')); // ビューに渡す



    }
}
