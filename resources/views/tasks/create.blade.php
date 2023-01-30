<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>タスク追加</title>
    </head>
    <body>
        <h2>タスクを追加する</h2>
        <form action="/tasks" method="POST">
            @csrf
            <div class="task_title">
                <input type="text" name="task[title]" placeholder="タイトル"/><br>
                <input type="number" name="task[point]" placeholder="ポイント 例: 100"/>
            </div>
            <div class="task_body">
                <textarea name="task[body]" placeholder="詳細"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>