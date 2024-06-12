<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
    <body>
    <x-app-layout>
    <x-slot name="header">
        　create
    </x-slot>
    
    <div class="container">
        <h1>投稿内容</h1>
        <form action="/posts" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="post[title]" id="title" placeholder="Enter title">
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="form-group">
                <label for="body">説明</label>
                <textarea name="post[body]" id="body" placeholder="Enter body"></textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="form-group">
                <label for="product_name">製品名</label>
                <input type="text" name="post[product_name]" id="product_name" placeholder="Enter product name">
                <p class="product_name__error" style="color:red">{{ $errors->first('post.product_name') }}</p>
            </div>
            <div class="form-group">
                <label for="fat">脂質</label>
                <input type="number" name="post[fat]" id="fat" step="0.01" placeholder="Enter fat">
            </div>
            <div class="form-group">
                <label for="protein">タンパク質</label>
                <input type="number" name="post[protein]" id="protein" step="0.01" placeholder="Enter protein">
            </div>
            <div class="form-group">
                <label for="carbohydrates">炭水化物</label>
                <input type="number" name="post[carbohydrates]" id="carbohydrates" step="0.01" placeholder="Enter carbohydrates">
            </div>
            <div class="form-group">
                <label for="image_url">画像</label>
                <input type="file" name="post[image_url]" id="image_url" placeholder="Enter image URL">
            </div>
           
            <input type="submit" value="Store">
        </form>
    </div>
    <div class="footer">
    <a href="/">戻る</a>
    </div>
    </x-app-layout>
</body>
</html>