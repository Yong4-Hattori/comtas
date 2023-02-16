<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>チケット詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
            <div class="ticket_title"> タイトル：{{ $ticket->title }} </div>
            <p> ポイント：{{ $ticket->point }}</p>
            <div class="ticket_body"> 詳細：{{ $ticket->body }}</div>
            <div class="edit"><a href="/tickets/{{ $ticket->id }}/edit">編集</a></div>

        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
