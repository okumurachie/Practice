<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::with('user')->get();
        $products = Product::with('purchases')->get();
        $products = Product::Paginate(9);
        return view('index', compact('users', 'products'));
    }

    public function store(UserRequest $request)
    {
        $form = $request->all();
        $form['password'] = Hash::make($form['password']);
        User::create($form);

        return redirect('/')->with('message', '会員登録が完了しました');
    }

    public function mypage(Request $request)
    {
        $user = auth()->user();
        $products = Product::where('user_id', $user->id)->get();
        $purchases = Purchase::where('user_id', $user->id)->get();

        $sales = Purchase::whereHas('product', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->with('product')->get();

        $totalSales = $sales->reduce(function ($total, $sale) {
            return $total + ($sale->product ? $sale->product->price : 0);
        }, 0);

        return view('mypage', compact('user', 'products', 'purchases', 'sales', 'totalSales'));
    }
}
