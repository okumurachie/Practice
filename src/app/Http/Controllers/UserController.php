<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $products = Product::with('user')->get();
        $products =Product::Paginate(9);
        return view('index',compact('users','products'));
    }
    public function store(UserRequest $request)
    {
        $form = $request->all();
        $form['password']= Hash::make($form['password']);
        User::create($form);
        return redirect('/')->with('message','会員登録が完了しました');
    }
    public function mypage(Request $request)
    {
        $user = auth()->user();
        $products = Product::where('user_id',$user->id)->get();
        $purchases = Purchase::where('user_id',$user->id)
                            ->with('product')
                            ->get();
        $sales = Purchase::whereHas('product',
                                    function($q) use($user){
                                        $q->where('user_id',$user->id); //Productのuser_idが$user->idのデータを取得
                                    })
                                ->join('products','purchases.product_id','=','products.id') //purchasesテーブルとproductsテーブルと
                                //をproduct_idをキーに結合
                                //->select('products.price')   金額のデータのみ必要なら、データサイズを減らし処理を軽量化できる
                                ->get(); //クエリ結果を取得
        $totalSales = Purchase::whereHas('product',
                                    function($q) use($user){
                                        $q->where('user_id',$user->id);
                                    })
                                    ->join('products','purchases.product_id','=','products.id')
                                    ->sum('products.price');
        return view('mypage',compact('user','products','purchases','sales','totalSales'));
    }
}
