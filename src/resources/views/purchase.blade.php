@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase__content">
    <div class="purchase-form__heading">
        <h2>{{$products['name']}}</h2>
        <h3>{{"¥" . $products['price']}}</h3>
    </div>
    <form class="form" action="/purchases/{{$products['id']}}" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お届け先</span>
            </div>
            <div class="form__group-content">
                <div class="form__product_id">
                    <input type="hidden" name="product_id" value="{{$products['id']}}">
                </div>
                <div class="form__input--text">
                    <input type="text" class="recipient" name="recipient" value="{{old('recipient')}}">
                    <div class="form__error">
                        @error('recipient')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">購入する</button>
            </div>
    </form>
</div>
@endsection