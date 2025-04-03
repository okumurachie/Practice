@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<div class="edit__content">
    <div class="edit-form__heading">
        <h2>出品登録</h2>
    </div>
    @foreach ($products as $product)
    <form class="edit-product-form" action="/products/{{$product['id']}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="edit-product-form__group">
            <div class="edit-product-form__group-title">
                <span class="edit-product-form__label--item">出品名</span>
            </div>
            <div class="edit-product-form__group-content">
                <div class="edit-product-form__input--text">
                    <input type="text" name="name" value="{{$product['name']}}" />
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
                    <input type="number" name="price" value="{{$product['price']}}">
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
            <div class="edit-product-form__group-content">
                <input type="file" id="imageInput" accept="image/*" name="image">
                <div class="edit-product-form__img">
                    <img id="preview" alt="image preview" style="max-width: 200px; display: none;">
                </div>
            </div>
        </div>
        <div class="edit-product-form__group">
            <div class="edit-product-form__group-title">
                <span class="edit-product-form__label--item">商品説明</span>
            </div>
            <div class="edit-product-form__group-content">
                <div class="edit-product-form__input--textarea">
                    <textarea name="comment" cols="60" rows="5">{{$product['comment']}}</textarea>
                </div>
            </div>
        </div>
        @endforeach
        <div class="edit-product-form__button">
            <button class="edit-product-form__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection