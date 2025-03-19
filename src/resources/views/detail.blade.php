@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <dv class="product_content">
        <p class="product_number">
            a-1
        </p>
        <div class="product_content_card">
            <div class="product_img">
                <img src="{{ asset('image/handbag.jpg') }}" alt="ハンドバッグ">
            </div>
            <div class="about-product">
                <div class="product_information">
                    <div class="product_name">
                        <h2>ハンドバッグ</h2>
                    </div>
                    <div class="product_price">
                        <p>¥⚫︎⚫︎⚫︎</p>
                    </div>
                    <div class="product_comment">
                        <p>コメントがここに入ります</p>
                    </div>
                </div>
                    <a href="">
                        <div class="form_button">
                            <button class="form__button-submit" type="submit">購入手続きへ</button>
                        </div>
                    </a>
            </div>
        </div>

    </dv>
@endsection
