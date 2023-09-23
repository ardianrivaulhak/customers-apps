<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\News;
use App\Models\Promotion;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
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
