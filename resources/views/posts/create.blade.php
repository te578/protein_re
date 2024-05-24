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
    <div class="container">
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="post[title]" id="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="post[body]" id="body" placeholder="Enter body"></textarea>
            </div>
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="post[product_name]" id="product_name" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="fat">Fat</label>
                <input type="number" name="post[fat]" id="fat" step="0.01" placeholder="Enter fat">
            </div>
            <div class="form-group">
                <label for="protein">Protein</label>
                <input type="number" name="post[protein]" id="protein" step="0.01" placeholder="Enter protein">
            </div>
            <div class="form-group">
                <label for="carbohydrates">Carbohydrates</label>
                <input type="number" name="post[carbohydrates]" id="carbohydrates" step="0.01" placeholder="Enter carbohydrates">
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="text" name="post[image_url]" id="image_url" placeholder="Enter image URL">
            </div>
           
            <input type="submit" value="Store">
        </form>
    </div>
    <div class="footer">
    <a href="/">戻る</a>
    </div>
</body>
</html>