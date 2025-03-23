@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
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

<div class="purchase__content">
    <div class="purchase-form__heading">
        <h2>商品名</h2>
        <h3>¥price</h3>
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
        <a href="" class="for-confirm"></a>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面へ</button>
            </div>
        </a>
    </form>
</div>
@endsection
