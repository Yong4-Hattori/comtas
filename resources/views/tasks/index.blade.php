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
        <div class="text-xl flex justify-center items-center">タスク一覧<br><br></div>
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='tasks'>
                    <h2 class='title'>
                    <div class="flex justify-center items-center"> <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></div>
                    </h2>
                    <div class="flex justify-center items-center" > <p class='body '>{{ $task->body }}</p></div>
                    <div class="flex justify-center items-center" > <p class='point'>{{$task->point}}ポイント</p></div>
                    <!--タスクを完了する-->
                    <div class="flex justify-center items-center" > <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}/updateStatus" method="post"></div>
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="{{$task->status}}">
                    <div class="flex justify-center items-center" ><button type="submit">完了</button></div>
                    </form>
                     
                    <!--タスクを削除する-->
                    <div class="flex justify-center items-center" > <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post"></div>
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-center items-center" ><button type="button" onclick="deleteTask({{ $task->id }})">削除</button></div>
                    </form>
                </div>
                <br>
            @endforeach
        </div>
        
    <!--完了タスク一覧-->
        <div class='dones'>
            <div class="text-xl flex justify-center items-center">完了タスク一覧</div><br>
            @foreach ($dones as $done)
                <div class='dones'>
                    <h2 class='title'>
                    <div class="flex justify-center items-center"> <a href="/tasks/{{ $done->id }}">{{ $done->title }}</a></div>
                    </h2>
                    <div class="flex justify-center items-center"> <p class='body'>{{ $done->body }}</p></div>
                    <div class="flex justify-center items-center"><form action="/tasks/{{ $done->id }}" id="form_{{ $done->id }}" method="post"></div>
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-center items-center"> <button type="button" onclick="deleteTask({{ $done->id }})">削除</button></div>
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