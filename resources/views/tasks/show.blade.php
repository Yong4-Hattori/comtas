<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タスク詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
            <div class="title"> タイトル：{{ $task->title }} </div>
            <p> ポイント：{{ $task->point }}</p>
            <div class="task_body"> 詳細：{{ $task->body }}</div>
            <div class="edit"><a href="/tasks/{{ $task->id }}/edit">編集</a></div>

        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>