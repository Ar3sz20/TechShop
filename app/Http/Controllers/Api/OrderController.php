<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->get();
        return response()->json(['orders' => $orders]);
    }

    public function show(Order $order)
    {
        return response()->json(['order' => $order]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string',
            'total_price' => 'required|numeric',
            'items' => 'required|array',
            'payment_method' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $order = Order::create($data);

        return response()->json([
            'message' => 'Rendelés sikeresen létrehozva!',
            'order' => $order,
        ], 201);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'address' => 'sometimes|string',
            'total_price' => 'sometimes|numeric',
            'items' => 'sometimes|array',
            'payment_method' => 'sometimes|string',
            'status' => 'sometimes|string',
        ]);

        $order->update($data);

        return response()->json([
            'message' => 'Rendelés sikeresen frissítve!',
            'order' => $order,
        ]);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'Rendelés sikeresen törölve!',
        ]);
    }
}
