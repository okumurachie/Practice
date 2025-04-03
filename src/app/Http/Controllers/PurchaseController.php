<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('purchase', compact('products'));
    }

    public function store(PurchaseRequest $request)
    {
        $purchases = $request->all();
        $purchases['user_id'] = Auth::id();
        $purchases['product_id'] = $request->input('product_id');
        Purchase::create($purchases);
        return redirect('/')->with('message', '購入が完了しました');
        //return redirect('/purchases/' . $purchases['product_id'])->with('message', '購入が完了しました');
    }
}
