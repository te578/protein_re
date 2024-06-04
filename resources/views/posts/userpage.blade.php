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
        .animate_button{
             background-color: #87CEEB; 
              color: #ffffff; 
              padding: 8px 16px; 
              border: none;
              border-radius: 25px; 
              cursor: pointer;
              font-size: 14px; 
              font-family: 'Arial', sans-serif;
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
              transition: all 0.3s ease;
              position: relative;
              overflow: hidden;
        }
        .animate_button2{
                 background-color:  #B0C4DE; 
          color: #ffffff; 
          padding: 8px 16px; 
          border: none;
          border-radius: 25px; 
          cursor: pointer;
          font-size: 14px; 
          font-family: 'Arial', sans-serif;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); 
          transition: all 0.3s ease;
          position: relative;
          overflow: hidden;
        }
        
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header"></x-slot>

        <div class="main-content">
            <h1>マイページ</h1>

                <div class="user-info">
                    <h2>ユーザー情報</h2>
                    <p>ユーザー名: {{ $user->name }}</p>
                    <p>メールアドレス: {{ $user->email }}</p>
                    <!-- その他のユーザー情報を表示する場合はここに追加 -->
                </div>
                <div>
            @if (Auth::user()->id !== $user->id)
                         @if (Auth::user()->following()->where('followed_user_id', $user->id)->exists())    
                            <form action="{{ route('unfollow', $user->id) }}" method="POST"><!--ユーザーBのIDがルートに入る-->
                                @csrf
                            <button type="submit" class="animate_button2">フォローを外す</button>
                        </form>
                    @else
                        <form action="{{ route('follow', $user->id) }}" method="POST">
                                @csrf
                            <button type="submit" class= "animate_button">フォローする</button>
                        </form>
                    @endif
                    
            @endif
                </div>


                @if ($posts->count() > 0)
                    <h2>過去の投稿一覧</h2>
                    @foreach($posts as $post)
                        <div class='post'>
                            <h2 class='title'>{{ $post->title }}</h2>
                            <p class='body'>{{ $post->body }}</p>
                            <p class='product_name'><strong>Product Name:</strong> {{ $post->product_name }}</p>
                            <p class='fat'><strong>Fat:</strong> {{ $post->fat }}g</p>
                            <p class='protein'><strong>Protein:</strong> {{ $post->protein }}g</p>
                            <p class='carbohydrates'><strong>Carbohydrates:</strong> {{ $post->carbohydrates }}g</p>
                            <p class='likes_count'><strong>Likes:</strong> {{ $post->likes_count }}</p>
                            @if($post->image_url)
                                <img class='image' src="{{ $post->image_url }}" alt="{{ $post->title }}">
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>まだ投稿がありません。</p>
                @endif

            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </div>

    </x-app-layout>
</body>
</html>

