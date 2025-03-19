<?php

namespace App\Http\Controllers;

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
        $productData['comment'] = $productData['comment'] ?? '';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/images',$fileName);
            $productData['image'] = 'storage/images/' . $fileName;
        }
        Product::create($productData);
        return redirect('/products')->with('message','出品登録が完了しました');
    }

    public function index()
    {
    return view('detail');
    }
    public function show($id)
    {
    $product = Product::with('member')->findOrFail($id);
    return view('detail', compact('product'));
    }
}
    //public function index()
    //{
        //$products = Product::with('member')->get();
        //return view('product.index', compact('products'));
    //}