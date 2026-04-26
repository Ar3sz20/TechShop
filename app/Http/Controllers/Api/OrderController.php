<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::All();
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
    
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // string → tömb
        $ids = explode(',', $order->item_id);
        $quantities = explode(',', $order->item_quantity);

        // melyik item-et módosítod?
        $targetId = $request->item_id;
        $newQty = $request->item_quantity;

        foreach ($ids as $index => $itemId) {
            if ($itemId == $targetId) {

                if ($newQty == 0) {
                    // törlés
                    unset($ids[$index]);
                    unset($quantities[$index]);
                } else {
                    // frissítés
                    $quantities[$index] = $newQty;
                }
            }
        }

        // index újrarendezés
        $ids = array_values($ids);
        $quantities = array_values($quantities);

        // vissza stringgé
        $order->item_id = implode(',', $ids);
        $order->item_quantity = implode(',', $quantities);

        // status frissítés
        if ($request->has('status')) {
            $order->status = $request->status;
        }

        $order->save();

        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'message' => 'Rendelés sikeresen törölve!',
        ]);
    }
}
