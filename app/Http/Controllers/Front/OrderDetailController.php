<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{

    public function index($status = 'new')
    {
        // ----------------------- hadel status -----------------------

        if (!in_array($status, ['new', 'approved', 'paid', 'completed', 'rejected', 'unpaid'])) {
            return redirect()->back()->with('error', 'Invalid route');
        }

        $user = Auth::user();

        $orders = Order::where(function ($query) use ($user, $status) {
            $query->where('email', $user->email);

            // Add additional conditions based on the status, if needed
            if ($status == 'new') {
                $query->where('status', 'pending')->where('delivery_status', 'undelivered');
            } elseif ($status == 'approved') {
                $query->where('status', 'accepted')->where('delivery_status', 'undelivered');
            } elseif ($status == 'paid') {
                $query->where('status', 'accepted')->where('delivery_status', 'undelivered')
                    ->where('payment_status', 'paid');
            } elseif ($status == 'completed') {
                $query->where('status', 'accepted')->where('delivery_status', 'delivered')
                    ->where('payment_status', 'paid');
            } elseif ($status == 'rejected') {
                $query->where('status', 'rejected');
            } elseif ($status == 'unpaid') {
                $query->where('payment_status', 'unpaid')->where('delivery_status', 'delivered');
            }
        })->get();

        return view('frontend.orders.index', compact('orders', 'status'));
    }



    public function show($order)
    {
        $order = Order::with(['items'])->find($order);
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }
        return view('frontend.orders.show', compact('order'));
    }


    }






