<!--<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム</title>
        <link rel="stylesheet" href="/public/createTask.css">
        
        <!-- Fonts 
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    -->
    
    <x-app-layout>
    <p>ようこそ、{{ Auth::user()->name }}さん。</p><br>
    <body>
        <a href='/tasks/create'>タスクを追加する</a><br>
        <a href='/tickets'>チケット一覧</a><br>
        <a href='/timelines'>タイムライン</a><br>
        <br>
        
    <!--タスク一覧-->
        <h3 class="text-xl">タスク一覧</h3>
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='tasks'>
                    <h2 class='title'>
                    <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
                    </h2>
                    <p class='body'>{{ $task->body }}</p>
                    <p class='point'>{{$task->point}}ポイント</p>
                    <!--タスクを完了する-->
                    <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}/updateStatus" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{$task->status}}">
                     <button type="submit">完了</button>
                     </form>
                     
                    <!--タスクを削除する-->
                    <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteTask({{ $task->id }})">削除</button>
                    </form>
                </div>
                <br>
            @endforeach
        </div>
        
    <!--完了タスク一覧-->
        <div class='dones'>
            <h3 class="text-xl">完了タスク一覧</h3>
            @foreach ($dones as $done)
                <div class='dones'>
                    <h2 class='title'>
                    <a href="/tasks/{{ $done->id }}">{{ $done->title }}</a>
                    </h2>
                    <p class='body'>{{ $done->body }}</p>
                    <form action="/tasks/{{ $done->id }}" id="form_{{ $done->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteTask({{ $done->id }})">削除</button>
                    </form>
                 
                </div>
                <br>
            @endforeach
            
        </div>
        </x-app-layout>
        
    </body>
    <script>
        function deleteTask(id){
            'use strict'
            
            if(confirm ('削除すると復元できません \n本当に削除しますか？'))
                document.getElementById(`form_${id}`).submit();
        }
    </script>
</html>