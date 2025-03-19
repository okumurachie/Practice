@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="ec_content">
    <div class="ec_content__inner">
    <div class="content-header">
        <h2>ファッション・小物類</h2>
    </div>
    <div class="lineup">
            <h3>おすすめラインナップ</h3>
        </div>
    <div class="content__box">
        <div class="content__box-1">
            <p>
                <a href="/details" class="content__id">a-1</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/handbag.jpg') }}" alt="ハンドバッグ">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>ハンドバッグ</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>お出かけにちょうど良いサイズです</p>
                </div>
            </div>
        </div>
        <div class="content__box-2">
            <p>
                <a href="/details" class="content__id">a-2</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/backpack.jpg') }}" alt="リュックサック">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>リュックサック</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>旅行におすすめです</p>
                </div>
            </div>
        </div>
        <div class="content__box-3">
            <p>
                <a href="/details" class="content__id">a-3</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/watch.jpg') }}" alt="腕時計">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>腕時計</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>シンプルなデザインの腕時計です</p>
                </div>
            </div>
        </div>
        <div class="content__box-4">
            <p>
                <a href="/details" class="content__id">a-4</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/loafers.jpg') }}" alt="ローファー">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>ローファー</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>フォーマルなシーンでも使えます</p>
                </div>
            </div>
        </div>
        <div class="content__box-5">
            <p>
                <a href="/details" class="content__id">a-5</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/shoulderbag.jpg') }}" alt="ショルダーバッグ">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>ショルダーバッグ</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>旅行のサブバックとしてちょうど良いサイズです</p>
                </div>
            </div>
        </div>
        <div class="content__box-6">
            <p>
                <a href="/details" class="content__id">a-6</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/shoes.jpg') }}" alt="シューズ">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>シューズ</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>ジーンズスタイルによく合います</p>
                </div>
            </div>
        </div>
        <div class="content__box-7">
            <p>
                <a href="/details" class="content__id">a-7</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/child hat.jpg') }}" alt="幼児用帽子">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>幼児用帽子</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>耳がついた可愛い帽子です</p>
                </div>
            </div>
        </div>
        <div class="content__box-8">
        <p>
                <a href="/details" class="content__id">a-8</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/glasses.jpg') }}" alt="サングラス">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>サングラス</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>オーソドックスなデザイン</p>
                </div>
            </div>
        </div>
        <div class="content__box-9">
        <p>
                <a href="/details" class="content__id">a-9</a>
            </p>
            <div class="content__inner">
                <div class="content__img">
                    <img src="{{ asset('image/cap.jpg') }}" alt="キャップ">
                </div>
                <div class="content__detail-1">
                    <div class="content__name">
                        <p>キャップ白</p>
                    </div>
                    <div class="content__price">
                        <p>¥price</p>
                    </div>
                </div>
                <div class="content__detail-2">
                    <p>オフホワイトデカジュアルなデザイン</p>
                </div>
            </div>
        </div>
        </div>
</div>
@endsection
