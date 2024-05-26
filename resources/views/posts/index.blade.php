<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* 親要素のスクロールを防ぎ、コンテナにスクロールを強制 */
            font-family: 'Nunito', sans-serif;
        }
        .scroll-container {
            
            height: 590px;
            
            overflow-y: auto; /* 全画面スクロールを有効に */
        }
        .posts {
            width: 80%;
            margin: auto;
        }
        .post {
            padding: 20px;
            border-bottom: 1px solid #ccc;
        }
        .post:last-child {
            border-bottom: none;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
        }
        .body {
            font-size: 16px;
            margin-top: 10px;
        }
        .product_name, .fat, .protein, .carbohydrates, .likes_count {
            font-size: 14px;
            margin-top: 5px;
        }
        .image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        
         .like-button {
        background-color: #e9e9e9; /* ボタンのデフォルトの背景色 */
        color: #333; /* ボタンのテキスト色 */
        border: 1px solid #ccc; /* ボタンのボーダー */
        padding: 5px 10px; /* ボタンの余白 */
        cursor: pointer; /* カーソルをポインターに変更 */
        transition: background-color 0.3s; /* 背景色の変化をアニメーション化 */
        }

        .like-button.liked {
        background-color: #007bff; /* いいねされた場合の背景色 */
        color: #fff; /* テキスト色を白に変更 */
        }
        
        /* ナビゲーションメニューのスタイル */
        nav {
            width: 10%; /* 左側に固定 */
            height: 100vh%;
            background-color: #f4f4f4;
            float: left;
            
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            padding: 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: #333;
            display: block;
        }
        nav ul li a:hover {
            background-color: #ddd;
        }
    </style>
   
</head>
<body>
    <x-app-layout>
    <x-slot name="header">
        　     
    </x-slot>
    <div class="scroll-container">
        <!-- ナビゲーションメニュー -->
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="/mypage">マイページ</a></li>
                <li><a href='/posts/create'>新規作成</a></li>
                <!-- 追加のページへのリンクをここに追加 -->
            </ul>
        </nav>
        
        <!-- コンテンツ -->
        <div class='posts'>
            <h1>PFC BALANCE</h1>
            <!-- 投稿をループして表示 -->
            @foreach($posts as $post)
                <div class='post'>
                    <h2 class='title'>{{ $post->title }}</h2>
                    <p class='body'>{{ $post->boby }}</p>
                    <p class='product_name'><strong>Product Name:</strong> {{ $post->product_name }}</p>
                    <p class='fat'><strong>Fat:</strong> {{ $post->fat }}g</p>
                    <p class='protein'><strong>Protein:</strong> {{ $post->protein }}g</p>
                    <p class='carbohydrates'><strong>Carbohydrates:</strong> {{ $post->carbohydrates }}g</p>
                    <p class='likes_count'><strong>Likes:</strong> {{ $post->likes_count }}</p>
                    @if($post->image_url)
                        <img class='image' src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    @endif
                   <button class="like-button" onclick="toggleLike(this)" data-post-id="{{ $post->id }}">Like</button>
                   </div>
            @endforeach
                </div>
        </div>
    </x-app-layout>
</body>
</html>

