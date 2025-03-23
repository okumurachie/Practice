<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Member;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        $products = Product::with('member')->get();
        $purchase = Purchase::with('product')->get();
        $members = Member::all();
        return view ('purchase');
    }
}
