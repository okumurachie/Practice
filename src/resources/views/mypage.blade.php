@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="my-list__content">
    <div class="my-list__title">
        <h2>マイページ</h2>
        <div class="member-info">
            <p>{{$member->name}}</p>
            <p>{{$member->email}}</p>
        </div>
    </div>
    <div class="product-table">
        <table class="product-table__inner">
            <tr class="product-table__row">
                <th class="product-table__header-1">出品履歴</th>
            </tr>
            @foreach($products as $product)
            <tr class="product-table__row">
                <td class="product-table__item-content">
                    <p class="product-name">{{$product['name']}}</p>
                    <p class="product-price">{{"¥" . $product['price']}}</p>
                    <p class="product-date">
                        <span class="date">出品日:</span>
                        <span class="created_at">{{$product['created_at']->format('Y年m月d日')}}</span>
                    </p>
                </td>
                <td class="product-table__item-edit">
                    <a href="/edit/{{$product['id']}}" class="product-edit">
                        <div class="form_button-edit">
                            <button class="form__button-submit" type="submit">編集</button>
                        </div>
                    </a>
                </td>
                <td class="product-table__item-destroy">
                    <a href="/edit/{{$product['id']}}" class="product-destroy">
                            <div class="form_button-destroy">
                                <button class="form__button-submit" type="submit">削除</button>
                        </div>
                            </div>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="purchase-proceeds__table">
            <div class="purchase-table">
                <table class="purchase-table__inner">
                    <tr class="purchase-table__row">
                        <th class="purchase-table__header">購入履歴</th>
                    </tr>
                    @foreach($purchases as $purchase)
                    <tr class="purchase-table__row">
                        <td class="purchase-table__item">
                            <p class="purchase-name">{{$purchase->product->name}}</p>
                            <p class="purchase-price">¥{{$purchase->product->price}}</p>
                            <p class="purchase-date">購入日：{{$purchase['created_at']->format('Y年m月d日')}}</p>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="proceeds-table">
                <table class="proceeds-table__inner">
                    <tr class="proceeds-table__row">
                        <th class="proceeds-table__header">売上リスト</th>
                    </tr>
                    <tr class="proceeds-table__row">
                        <td class="proceeds-table__item1">
                            <p class="proceeds-name">売上商品名</p>
                            <p class="proceeds-price">¥price</p>
                            <p class="proceeds-date">売上日</p>
                        </td>
                    </tr>
                    <tr class="proceeds-table__row">
                        <td class="proceeds-table__item2">
                            <p class="total-sales">累計売上額</p>
                            <p class="total-sales-price">¥累計額</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

