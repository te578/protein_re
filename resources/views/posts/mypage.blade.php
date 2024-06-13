<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .main-content {
            max-width: 1200px;
            margin: 0 auto; /* 中央寄せ */
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .user-info {
            margin-bottom: 20px;
        }
        .post {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .title {
            font-size: 1.5em;
            margin-bottom: 5px;
        }
        .body, .product_name, .fat, .protein, .carbohydrates, .likes_count {
            margin-bottom: 5px;
        }
        .image {
            max-width: 100%;
            height: auto;
        }
        .footer {
            margin-top: 20px;
        }
        .footer a {
            text-decoration: none;
            color: #007BFF;
        }
        .follow-info {
             margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
          .follow-info .label {
            display: block;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header"></x-slot>

        <div class="main-content">
            <h1>マイページ</h1>

            @if ($user)
                <div class="user-info">
                    <h2>ユーザー情報</h2>
                    <p>ユーザー名: {{ $user->name }}</p>
                    <p>メールアドレス: {{ $user->email }}</p>
                    <!--<p>フォロワー:$user->follows->user_id->count</p>-->
                </div>
                <div class='follow-info'>
                    <p>フォロー数<span class="label">{{$followingsCount}}</span></p>
                    <p>フォロワー数<span class="label">{{$followersCount}}</span></p>
                </div>
                   

                @if ($posts->count() > 0)
                    <h2>過去の投稿一覧</h2>
                    @foreach($posts as $post)
                        <div class='post'>
                            <h2 class='title'>{{ $post->title }}</h2>
                            <p class='body'>{{ $post->body }}</p>
                            <p class='product_name'><strong>製品名:</strong> {{ $post->product_name }}</p>
                            <p class='fat'><strong>脂質:</strong> {{ $post->fat }}g</p>
                            <p class='protein'><strong>タンパク質:</strong> {{ $post->protein }}g</p>
                            <p class='carbohydrates'><strong>炭水化物:</strong> {{ $post->carbohydrates }}g</p>
                            
                            @if($post->image_url)
                                <img class='image' src="{{ $post->image_url }}" alt="{{ $post->title }}">
                            @endif
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})" style="color: red;">削除</button> 
                            </form>
                            <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集</a></div>
                            <script>
                                    function deletePost(id) {
                                                'use strict'

                                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                        document.getElementById(`form_${id}`).submit();
                                         }
                                                                                                    }
                            </script>
                        </div>
                    @endforeach
                @else
                    <p>まだ投稿がありません。</p>
                @endif
            @else
                <p>ログインしていません。</p>
            @endif

            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>

    </x-app-layout>
</body>
</html>
