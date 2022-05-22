<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ShopController extends Controller
{
    public function showAll(Request $request) {
        $items = Item::get();
        return view('index', [
            'items' => $items
        ]);
    }

    public function showCategory($id) {
        $items = Item::where('category_id', $id)->get();
        return view('index', [
            'items' => $items,
        ]);
    }
}
