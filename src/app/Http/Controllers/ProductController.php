<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Member;

class ProductController extends Controller
{
    public function create()
    {
        $products = Product::with('member')->get();
        $members = Member::all();

        return view('product',compact('products', 'members'));
    }
    public function store(ProductRequest $request)
    {

        $productData = $request->all();
        $productData['member_id'] = Auth::id();
        //$productData['comment'] = $productData['comment'] ?: '';
        //Log::debug('a');
        if($request->hasFile('image')){
            //Log::debug('test');
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/images',$fileName);
            $productData['image'] = 'storage/images/' . $fileName;
        }
        //exit;
        Product::create($productData);
        return redirect('/products')->with('message','出品登録が完了しました');
    }

    /*public function index()
    {
        $products = Product::with('member')->get();
        return view('detail',compact('products'));
    }
    */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('detail', compact('products'));
    }

    public function edit(Request $request)
        {
            $products = Product::find($request->id);
            return view('edit',['form' => $products]);
        }

    public function update(ProductRequest $request)
        {
            $products = $request ->all();
            Product::find($request->id)->update($products);
            return redirect('/edit')->with('message','出品情報を更新しました');
        }

}
    //public function index()
    //{
        //$products = Product::with('member')->get();
        //return view('product.index', compact('products'));
    //}