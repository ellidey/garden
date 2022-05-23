<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Position;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $all = 0;
        $positions = Position::where('user_id', $request->user()->id)->where('order_id', null)->get();
        foreach ($positions as $position) {
            $all += $position->amount * $position->item->cost;
        }
        return view('order.create', [
            'positions' => $positions,
            'price' => $all
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
           'name' => $request->name,
           'surname' => $request->surname,
           'lastname' => $request->lastname,
           'address' => $request->address,
           'index' => $request->index
        ]);

       $user = $request->user();
       Position::where('user_id', $user->id)->where('order_id', null)->update([
           'order_id' => $order->id
       ]);

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::where('id', $id)->with('positions')->first();
        $all = 0;
        foreach ($order->positions as $position) {
            $all += $position->amount * $position->item->cost;
        }
        return view('admin.orders.edit', [
            'order' => $order,
            'price' => $all
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::where('id', $id)->first();
        $order->confirm = !$order->confirm;
        $order->save();
        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', $id)->delete();
        return redirect(route('orders.index'));
    }
}
