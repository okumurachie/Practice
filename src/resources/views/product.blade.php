@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<div class="register__alert">
    @if(session('message'))
    <div class="register__alert--success">
        {{session('message')}}
    </div>
    @endif
    @if ($errors->any())
    <div class="register__alert--danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="register__content">
        <div class="register-form__heading">
            <h2>出品登録</h2>
        </div>
        <form class="product-form" action="/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="product-form__group">
                <div class="product-form__group-title">
                    <span class="product-form__label--item">出品名</span>
                </div>
                <div class="product-form__group-content">
                    <div class="product-form__input--text">
                        <input type="text" name="name" value="{{ old('name') }}" />
                    </div>
                    <div class="product-form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="product-form__group">
                <div class="product-form__group-title">
                    <span class="product-form__label--item">価格</span>
                </div>
                <div class="product-form__group-content">
                    <div class="product-form__input--text">
                        <input type="number" name="price" value="{{ old('price') }}">
                    </div>
                    <div class="product-form__error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="product-form__group">
                <div class="product-form__group-title">
                    <span class="product-form__label--item">商品画像</span>
                </div>
                <div class="product-form__group-content">
                    <input type="file" id="imageInput" accept="image/*" name="image">
                    <div class="product-form__img">
                        <img id="preview" alt="image preview" style="max-width: 200px; display: none;">
                    </div>
                </div>
            </div>
            <div class="product-form__group">
                <div class="product-form__group-title">
                    <span class="product-form__label--item">商品説明</span>
                </div>
                <div class="product-form__group-content">
                    <div class="product-form__input--textarea">
                        <textarea name="comment" cols="60" rows="5">{{old('comment','')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="product-form__button">
                <button class="product-form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
    @endsection