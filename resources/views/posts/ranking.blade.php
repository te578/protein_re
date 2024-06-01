<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>いいねランキング</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #007bff; /* 外枠の色と太さ */
            border-radius: 10px; /* 外枠の角を丸くする */
            background-color: #fff; /* コンテンツの背景色 */
        }
        .post { 
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ccc; /* 区切り線のスタイル */
        }
        .post:last-child {
            border-bottom: none; /* 最後の投稿の下には区切り線を表示しない */
        }
        .post .image {
            max-width: 100%;
            height: auto;
        }
        .post .rank {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545; /* ランキングの色を赤に設定 */
        }
        .post .title {
            font-size: 20px;
            margin-bottom: 5px;
            color: #333; /* タイトルの文字色 */
        }
        .post .body {
            color: #555; /* 本文の文字色 */
            margin-bottom: 10px;
        }
        .post .product-name {
            font-weight: bold;
            color: #007bff; /* 製品名の色をブルーに設定 */
        }
        .post .nutrition-info {
            margin-bottom: 5px;
            color: #333; /* 栄養情報の文字色 */
        }
        .footer {
            margin-top: 20px;
            text-align: center;
        }
        .footer a {
            color: #007bff; /* リンクの色をブルーに設定 */
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
      
    </style>
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                 <li><a href="/">TOPに戻る</a></li>
                <!-- 追加のページへのリンクをここに追加 -->
            </ul>
        </nav>
        <h1 class="mt-5 mb-4">いいねランキング</h1>
        @php $rank = 1; @endphp <!-- ランキング用のカウンター変数 -->
        @foreach($posts as $post)
            <div class="post">
                <span class="rank">{{ $rank }}位</span>
                <h2 class="title">{{ $post->title }}</h2>
                <p class="body">{{ $post->body }}</p>
                <p class="product-name"><strong>Product Name:</strong> {{ $post->product_name }}</p>
                <p class="nutrition-info"><strong>Fat:</strong> {{ $post->fat }}g | <strong>Protein:</strong> {{ $post->protein }}g | <strong>Carbohydrates:</strong> {{ $post->carbohydrates }}g</p>
                @if($post->image_url)
                    <img class="image" src="{{ $post->image_url }}" alt="{{ $post->title }}">
                @endif
            </div>
            @php $rank++; @endphp <!-- ランキング用のカウンター変数をインクリメント -->
        @endforeach
    </div>
    <div class="footer">
        <a href="/">戻る</a>
    </div>
    
</body>
</html>
