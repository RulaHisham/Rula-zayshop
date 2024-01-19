<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function orderDetails($id)
    {
        $user = auth()->user();

        // Retrieve the order details for the authenticated user
        $order = Order::where('id', $id)->where('user_id', $user->id)->first();

        // Check if the order exists
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Add any additional logic to fetch specific order details as needed
        $orderDetails = [
            'id' => $order->id,
            'order_number' => $order->order_number,
            'total_amount' => $order->total_amount,
            // ... other order details ...
        ];

        return response()->json(['orderDetails' => $orderDetails]);
    }
}
