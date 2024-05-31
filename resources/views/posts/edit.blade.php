<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿を編集</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>投稿を編集</h1>
    </header>
    <div class="container">
        <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">タイトル:</label>
            <input type="text" name="title" value="{{ $post->title }}" id="title">

            <label for="body">内容:</label>
            <textarea name="body" id="body">{{ $post->body }}</textarea>

            <label for="product_name">商品名:</label>
            <input type="text" name="product_name" value="{{ $post->product_name }}" id="product_name">

            <label for="fat">脂質:</label>
            <input type="text" name="fat" value="{{ $post->fat }}" id="fat">

            <label for="protein">タンパク質:</label>
            <input type="text" name="protein" value="{{ $post->protein }}" id="protein">

            <label for="carbohydrates">炭水化物:</label>
            <input type="text" name="carbohydrates" value="{{ $post->carbohydrates }}" id="carbohydrates">

            <label for="image_url">画像:</label>
            <input type="file" name="image_url" id="image_url">
            <br>
            @if($post->image_url)
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
            @endif

            <button type="submit">投稿を更新</button>
        </form>
    </div>
</body>
</html>

