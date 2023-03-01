<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>タスク追加</title><br>
    </head>
    <body>
        <h2>タスクを追加する</h2><br>

        @if ($errors->any())
	       <div class="alert alert-danger" style="color:red">
    	        <ul>
    	            @foreach ($errors->all() as $error)
    	                <li>{{ $error }}</li>
    	            @endforeach
    	        </ul>
	        </div>
	   @endif
	    
	    <!--入力フォーム-->
        <form action="/tasks" method="POST">
            @csrf
            <div class="task_title">
                <input type="text" name="task[title]" placeholder="タイトル" value="{{ old('post.title') }}"/><br>
                <input type="number" name="task[point]" placeholder="ポイント 例: 100" value="{{ old('post.title') }}"/>
                <input type="hidden" name="task[user_id]" value="{{Auth::id()}}" />
            </div>
            
            <div class="task_body">
                <textarea name="task[body]" placeholder="詳細"  value="{{ old('post.title') }}"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>
