<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $post->title }} - Blog</title>
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

        .post-details {
            margin-top: 20px;
        }

        .post-details p {
            margin-bottom: 10px;
        }

        .post-details img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 10px;
        }

        .footer a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <x-app-layout>
    <x-slot name="header">
        　show
    </x-slot>
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="post-details">
            <p>{{ $post->body }}</p>
            <p><strong>Product Name:</strong> {{ $post->product_name }}</p>
            <p><strong>Fat:</strong> {{ $post->fat }}g</p>
            <p><strong>Protein:</strong> {{ $post->protein }}g</p>
            <p><strong>Carbohydrates:</strong> {{ $post->carbohydrates }}g</p>
            @if($post->image_url)
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
            @endif
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
    </x-app-layout>
</body>
</html>
