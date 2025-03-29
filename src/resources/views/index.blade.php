@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
<div class="ec_content">
    <div class="ec_content__inner">
        <div class="content-header">
            <h2>ファッション・小物類</h2>
        </div>
        <div class="lineup">
                <h3>おすすめラインナップ</h3>
        </div>
        <div class="content__box">
            @foreach($products as $product)
            <div class="content__box-item">
                <p>
                    <a href="/details/{{$product['id']}}" class="content__id">{{$product['id']}}</a>
                </p>
                <div class="content__inner">
                    <div class="content__img">
                        <img src="{{ asset('storage/images/' . $product['image']) }}" alt="{{$product['name']}}">
                    </div>
                    <div class="content__detail-1">
                        <div class="content__name">
                            <p>{{$product['name']}}</p>
                        </div>
                        <div class="content__price">
                            <p>{{"¥".$product['price']}}</p>
                        </div>
                    </div>
                    <div class="content__detail-2">
                        <p>{{$product['comment']}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="pagination">
{{$products->links()}}
</div>
@endsection
