<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\EditRequest;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    public function create()
    {
        $products = Product::with('user')->get();
        $users = User::all();

        return view('product', compact('products', 'users'));
    }
    public function store(ProductRequest $request)
    {

        $productData = $request->all();
        $productData['user_id'] = Auth::id();
        //$productData['comment'] = $productData['comment'] ?: '';
        //Log::debug('a');
        if ($request->hasFile('image')) {
            //Log::debug('test');
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/images', $fileName);
            $productData['image'] = 'storage/images/' . $fileName;
        }
        //exit;
        Product::create($productData);
        return redirect('/')->with('message', '出品登録が完了しました');
    }

    /*public function index()
    {
        $products = Product::with('user')->get();
        return view('detail',compact('products'));
    }
    */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        $products = Product::with('purchases')->findOrFail($id);
        return view('detail', compact('products'));
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        //return view('edit', ['form' => $products]);
        return view('edit', compact('product'));
    }
    public function update(EditRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update(
            $request->except('image'),
        );
        return redirect('mypage')->with('message', '出品情報を更新しました');
    }
    public function imageUpdate(ImageRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/images', $fileName);
        $productData['image'] = 'storage/images/' . $fileName;
        return redirect('mypage')->with('message', '画像を更新しました');
    }
    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        //return view('edit', ['form' => $products]);
        return view('delete', compact('product'));
    }
    public function softDelete(Request $request)
    {
        $productId = $request->input('product_id');

        DB::table('products')
            ->where('product_id', $productId)
            ->update(['deleted_at' => now()]);
        return redirect('mypage')->with('message', '出品を取り消しました');
    }
}
    //public function index()
    //{
        //$products = Product::with('user')->get();
        //return view('product.index', compact('products'));
    //}
