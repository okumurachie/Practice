@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
<dv class="product_content">
    <div class="product_content_card">
        <div class="product_img">
            <img src="{{asset($products['image'])}}" alt="{{$products['name']}}">
        </div>
        <div class="about-product">
            <div class="product_information">
                <div class="product_name">
                    <h2>{{$products['name']}}</h2>
                </div>
                <div class="product_price">
                    <p>{{"¥" . number_format($products['price'])}}</p>
                </div>
                <div class="product_comment">
                    <p>{{$products['comment']}}</p>
                </div>
            </div>
            @if($products->purchases)
            <h1 class="product_sold">SOLD</h1>
            @else
            <a href="/purchases/{{$products['id']}}">
                <div class="form_button">
                    <button class="form__button-submit" type="submit">購入手続きへ</button>
                </div>
            </a>
            @endif
        </div>
    </div>

</dv>
@endsection