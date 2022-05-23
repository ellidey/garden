<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Position;
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

    public function addBasket(Request $request, $id) {
        $amount = 1;

        if ($request->amount) {
            $amount = $request->amount;
        }

        Position::create([
            'user_id' => $request->user()->id,
            'item_id'=> $id,
            'amount' => $amount
        ]);

        return back()->withInput();
    }

    public function removeBasket(Request $request, $id) {
        Position::where('id', $id)->delete();
        return back()->withInput();
    }

    public function createOrder(Request $request) {
        $all = 0;
        foreach ($request->user()->positions as $position) {
            $all += $position->amount * $position->item->cost;
        }
        return view('order.create', [
            'positions' => $request->user()->positions,
            'price' => $all
        ]);
    }
}
