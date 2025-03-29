@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.confirm.css') }}">
@endsection

@section('content')
<div class="purchase__alert">
    <h2>確認後、購入ボタンを押してください</h2>
</div>
<div class="purchase__content">
    <div class="purchase-form__heading">
        <h2>{{$products['name']}}</h2>
        <h3>{{"¥" . $products['price']}}</h3>
    </div>
    <form class="form" action="/purchases" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お届け先</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" class="recipient" name="recipient" value="{{old('recipient')}}">
                <div class="form__error">
                    @error('recipient')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <a href="/purchase.complete" class="for-complete">
            <div class="form__button_complete">
                <button class="form__button_complete-submit" type="submit">購入する</button>
            </div>
        </a>
    </form>
    <div class="back-for-purchase">
        <a href="purchases/{{$products['id']}}" class="for-purchase">
            <div class="form__button_back">
                    <button class="form__button_back-submit" type="submit">修正する</button>
            </div>
        </a>
    </div>
</div>
@endsection
