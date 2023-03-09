
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>チケット追加</title>
    </head>
    
    <body>
        <h2>チケットを追加する</h2>
        

        
        <form action="/tickets" method="POST">
            @csrf
            <div class="ticket_title">
                <input type="text" name="ticket[title]" placeholder="タイトル"/><br>
                <input type="number" name="ticket[point]" placeholder="ポイント 例: 100"/>
            </div>
            <div class="ticket_body">
                <textarea name="ticket[body]" placeholder="詳細"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
