<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Member;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\PurchaseRequest as RequestsPurchaseRequest;

class PurchaseController extends Controller
{
    public function show($id)
    {
        //$products = Product::with('member')->get();
        $products = Product::findOrFail($id);
        //purchase = Purchase::with('product')->get();
        $members = Member::all();
        return view ('purchase',compact('products'));
    }

    /*public function index($id)
    {
        $products = Product::findOrFail($id);
    //purchase = Purchase::with('product')->get();
        $members = Member::all();
        return view ('purchase.confirm',compact('products'));
    }
    */
    public function store(PurchaseRequest $request)
    {
        $purchases = $request->all();
        $purchases['member_id'] = Auth::id();
        $purchases['product_id']= $request->input('product_id');
        Purchase::create($purchases);
        //return redirect()->route('purchase.complete')->with('massage','購入が完了しました');
        return redirect('/purchases/{id}')->with('message','購入が完了しました');
    }
}
