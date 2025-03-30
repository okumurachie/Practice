<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\Product;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        $products = Product::with('member')->get();
        $products =Product::Paginate(9);
        return view('index',compact('members','products'));
    }
    public function store(MemberRequest $request)
    {
        $form = $request->all();
        $form['password']= Hash::make($form['password']);
        Member::create($form);
        return redirect('/')->with('message','会員登録が完了しました');
    }
    public function mypage(Request $request)
    {
        $member = auth()->user();
        $products = Product::where('member_id',$member->id)->get();
        $purchases = Purchase::where('member_id',$member->id)
                            ->with('product')
                            ->get();
        $sales = Purchase::whereHas('product',
                                    function($q) use($member){
                                        $q->where('member_id',$member->id); //Productのmember_idが$member->idのデータを取得
                                    })
                                ->join('products','purchases.product_id','=','products.id') //purchasesテーブルとproductsテーブルと
                                //をproduct_idをキーに結合
                                //->select('products.price')   金額のデータのみ必要なら、データサイズを減らし処理を軽量化できる
                                ->get(); //クエリ結果を取得
        $totalSales = Purchase::whereHas('product',
                                    function($q) use($member){
                                        $q->where('member_id',$member->id);
                                    })
                                    ->join('products','purchases.product_id','=','products.id')
                                    ->sum('products.price');
        return view('mypage',compact('member','products','purchases','sales','totalSales'));
    }
}
