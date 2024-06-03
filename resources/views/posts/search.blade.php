<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .search-form input[type="text"] {
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }
        .search-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .search-results {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        .search-results th, .search-results td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .search-results th {
            background-color: #f2f2f2;
        }
        .no-results {
            text-align: center;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-form">
            <form action="{{ route('searching') }}" method="GET">
                <input type="text" name="keyword" placeholder="検索キーワードを入力">
                <input type="submit" value="検索">
            </form>
        </div>
        <nav>
            <ul>
                 <li><a href="/">TOPに戻る</a></li>
                <!-- 追加のページへのリンクをここに追加 -->
            </ul>
        </nav>

        @if (isset($keyword) && $keyword != '')
            @if ($posts->isEmpty())
                <div class="no-results">検索結果がありません</div>
            @else
                <table class="search-results">
                    <tr>
                        <th>タイトル</th>
                        <th>内容</th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        @endif
    </div>
</body>
</html>
