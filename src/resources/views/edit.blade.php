@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="edit__content">
    <div class="edit-form__heading">
        <h2>出品登録</h2>
    </div>
    <form class="edit-product-form" action="/products/update/{{$product->id}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="edit-product-form__group">
            <div class="edit-product-form__group-title">
                <span class="edit-product-form__label--item">出品名</span>
            </div>
            <div class="edit-product-form__group-content">
                <div class="edit-product-form__input--text">
                    <input type="text" name="name" value="{{$product->name}}" />
                </div>
                <div class="edit-product-form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="edit-product-form__group">
            <div class="edit-product-form__group-title">
                <span class="edit-product-form__label--item">価格</span>
            </div>
            <div class="edit-product-form__group-content">
                <div class="edit-product-form__input--text">
                    <input type="number" name="price" value="{{$product->price}}">
                </div>
                <div class="edit-product-form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="edit-product-form__group">
            <div class="edit-product-form__group-title">
                <span class="edit-product-form__label--item">商品画像</span>
            </div>
            @if ($product->image)
            <div class="current_image">
                <p class="current_img">現在の画像</p>
                <img src="{{asset($product->image)}}" alt="商品画像" width="150">
            </div>
            @endif
            <div class="edit-product-form__group-content">
                <label for="image">画像を更新する場合はこちら：</label><br>
                <input type="file" id="imageInput" accept="image/*" name="image">
                <input type="hidden" name="current_image" value="{{$product->image}}">
            </div>
        </div>
        <div class="edit-product-form__group">
            <div class="edit-product-form__group-title">
                <span class="edit-product-form__label--item">商品説明</span>
            </div>
            <div class="edit-product-form__group-content">
                <div class="edit-product-form__input--textarea">
                    <textarea name="comment" cols="60" rows="5">{{$product->comment}}</textarea>
                </div>
            </div>
        </div>
        <div class="edit-product-form__button">
            <button class="edit-product-form__button-submit" type="submit">変更する</button>
        </div>
    </form>
</div>
@endsection