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
        $product = Product::with('purchases')->findOrFail($id);
        return view('detail', compact('product'));
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
        // 古い画像を削除（あれば）
        if ($product->image) {
            $oldImagePath = str_replace('storage/', 'public/', $product->image);
            if (\Storage::exists($oldImagePath)) {
                \Storage::delete($oldImagePath);
            }
        }
        //保存する時は 'storage/images/ファイル名'でも、実際は 'public/images/ファイル名' にあるから。str_replaceする。

        //新しい画像をアップロード
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('public/images', $fileName);
        // $productData['image'] = 'storage/images/' . $fileName;  $productData使っていないので削除
        $product->image = 'storage/images/' . $fileName;  //画像パスを更新
        $product->save(); //DBに保存
        return redirect('mypage')->with('message', '画像を更新しました');
    }
    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        //return view('edit', ['form' => $products]);
        return view('delete', compact('product'));
    }
    public function softDelete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('mypage')->with('message', '出品を取り消しました');
    }
    public function ship($id)
    {
        $product = Product::findOrFail($id);
        if (Auth::id() === $product->user_id) {
            $product->shipping_status = 1;
            $product->save();
        }
        return redirect('mypage')->with('message', '商品を発送しました');
    }
}
    //public function index()
    //{
        //$products = Product::with('user')->get();
        //return view('product.index', compact('products'));
    //}
