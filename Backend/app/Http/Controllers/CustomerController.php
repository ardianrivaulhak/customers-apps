<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\News;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    public  function index(Request $request)
    {
        # code...
        $customers = Customer::with('orders.items')->get();

        return response()->json([
            'data' => $customers,
            'message' => 'successfully read data'
        ]);
    }


    public function getCustomerById($id)
    {
        $customer = Customer::with('orders.items')->find($id);

        if (!$customer) {
            return response()->json([
                'message' => 'Customer not found'
            ], 404);
        }

        return response()->json([
            'data' => $customer,
            'message' => 'Customer retrieved successfully'
        ]);
    }

    public function topUpBalance($id, Request $request)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $amount = $request->input('amount');
        $customer->balance += $amount;
        $customer->save();

        return response()->json(['message' => 'Balance topped up successfully']);
    }

    public function makeTransaction($id, Request $request)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $amount = $request->input('amount');

        if ($customer->balance < $amount) {
            return response()->json(['message' => 'Insufficient balance'], 400);
        }

        $customer->balance -= $amount;
        $customer->save();

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->total_price = $amount;
        $order->save();

        $items = $request->input('items');

        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_name = $item['product_name'];
            $orderItem->product_price = $item['product_price'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        return response()->json(['message' => 'Transaction successful']);
    }



    public function getPromotions()
    {
        $promotions = Promotion::all();
        return response()->json($promotions);
    }

    public function getNews()
    {
        $news = News::all();
        return response()->json($news);
    }
}
