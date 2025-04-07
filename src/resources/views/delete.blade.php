@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/delete.css') }}">
@endsection

@section('content')
<div class="delete__content">
    <div class="delete-form__heading">
        <h2>出品取消</h2>
    </div>
    <div class="delete-product__group">
        <div class="delete-product__group-title">
            <span class="delete-product__label--item">出品名</span>
        </div>
        <div class="delete-product__group-content">
            <div class="delete-product-name">{{$product->name}}</div>
        </div>
    </div>
    <div class="delete-product__group">
        <div class="delete-product__group-title">
            <span class="delete-product__label--item">価格</span>
        </div>
        <div class="delete-product-price">¥{{number_format($product->price)}}</div>
    </div>
    <div class="delete-product-form__group">
        <div class="delete-product__group-title">
            <span class="delete-product__label--item">商品画像</span>
        </div>
        @if ($product->image)
        <div class="current_image">
            <img src="{{asset($product->image)}}" alt="商品画像" width="150">
        </div>
        @endif
    </div>
    <div class="delete-product__group">
        <div class="delete-product__group-title">
            <span class="delete-product__label--item">商品説明</span>
        </div>
        <div class="delete-product__group-content">
            <div class="delete-product-comment">{{$product->comment}}</div>
        </div>
    </div>
    <form class="delete-product-form" action="{{route('products.softDelete', ['id' => $product->id ])}}" method="post">
        @csrf
        <div class="delete-product-form__button">
            <button class="delete-product-form__button-submit" type="submit">出品を取り消す</button>
        </div>
    </form>
</div>
@endsection