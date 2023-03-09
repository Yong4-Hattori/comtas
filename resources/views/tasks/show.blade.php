<x-app-layout>
    <body>
        <div class="title"> タイトル：{{ $task->title }} </div>
        <p> ポイント：{{ $task->point }}</p>
        <div class="task_body"> 詳細：{{ $task->body }}</div>
        
            <br>
            <div class="edit"><a href="/tasks/{{ $task->id }}/edit">編集</a></div>
            <a href="/">戻る</a>
        </div>
    </body>

</x-app-layout>