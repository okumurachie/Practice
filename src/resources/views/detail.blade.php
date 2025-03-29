@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <dv class="product_content">
        <p class="product_number">
            {{$products['id']}}
        </p>
        <div class="product_content_card">
            <div class="product_img">
                <img src="{{ asset('storage/images/' . $products['image']) }}" alt="{{$products['name']}}">
            </div>
            <div class="about-product">
                <div class="product_information">
                    <div class="product_name">
                        <h2>{{$products['name']}}</h2>
                    </div>
                    <div class="product_price">
                        <p>{{"¥" . $products['price']}}</p>
                    </div>
                    <div class="product_comment">
                        <p>{{$products['comment']}}</p>
                    </div>
                </div>
                    <a href="/purchases/{{$products['id']}}">
                        <div class="form_button">
                            <button class="form__button-submit" type="submit">購入手続きへ</button>
                        </div>
                    </a>
            </div>
        </div>

    </dv>
@endsection
