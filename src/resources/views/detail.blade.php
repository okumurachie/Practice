@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<dv class="product_content">
    <div class="product_content_card">
        <div class="product_img">
            <img src="{{asset($product['image'])}}" alt="{{$product['name']}}">
        </div>
        <div class="about-product">
            <div class="product_information">
                <div class="product_name">
                    <h2>{{$product['name']}}</h2>
                </div>
                <div class="product_price">
                    <p>{{"¥" . number_format($product['price'])}}</p>
                </div>
                <div class="product_comment">
                    <p>{{$product['comment']}}</p>
                </div>
            </div>
            @if($product->purchases()->exists())
            <h1 class="product_sold">SOLD</h1>
            @else
            @if(Auth::id() !== $product->user_id)
            <a href="/purchases/{{$product['id']}}">
                <div class="form_button">
                    <button class="form__button-submit" type="submit">購入手続きへ</button>
                </div>
            </a>
            @else
            <h1 class="your-product">あなたが出品した商品です</h1>
            @endif
            @endif
        </div>
    </div>

</dv>
@endsection