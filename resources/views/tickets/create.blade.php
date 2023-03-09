
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>チケット追加</title>
    </head>
    
    <body>
        <h2>チケットを追加する</h2>
        
        <!--バリデーションエラー表示-->
      @if ($errors->any())
	       <div class="alert alert-danger" style="color:red">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	        </div>
	  @endif
        
        
        <form action="/tickets" method="POST">
            @csrf
            <div class="ticket_title">
                <input type="text" name="ticket[title]" placeholder="タイトル" value="{{ old('ticket.title') }}"/><br>
                <input type="number" name="ticket[point]" placeholder="ポイント 例: 100" value="{{ old('ticket.point') }}"/>
            </div>
            <div class="ticket_body">
                <textarea name="ticket[body]" placeholder="詳細" value="{{ old('ticket.body') }}"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
