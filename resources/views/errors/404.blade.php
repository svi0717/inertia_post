<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
            color: #636b6f;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .content {
            max-width: 600px;
            padding: 20px;
        }
        .title {
            font-size: 36px;
            font-weight: bold;
        }
        .message {
            font-size: 18px;
        }

        a {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="title">404 | 페이지를 찾을 수 없습니다.</div>
        <div class="message">죄송합니다. 존재하지 않는 페이지입니다.</div>
        <a href="{{ url('/posts') }}">홈으로 돌아가기</a>
    </div>
</body>
</html>
