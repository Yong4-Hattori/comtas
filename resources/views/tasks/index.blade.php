

<x-app-layout>
    <body>
        
    <!--タスク一覧-->
        <p class="text-3xl font-bold">タスク一覧</p><br>
        <div class='tasks'>
            @foreach ($tasks as $task)
                <div class='tasks'>
     
                    <a class= "text-xl" href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
                    <p class = "text-sm">{{$task->updated_at}}</p>
                    <div class="body" > <p class='body '>{{ $task->body }}</p></div>
                    <div class="point" > <p class='point'>{{$task->point}}ポイント</p></div>
                
                
                <div class="flex flex-row">
                   <!--タスクを完了する-->
                    <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}/updateStatus" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{$task->status}}">
                        <button class="mx-2 my-2 px-3 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100" type="submit">完了</button>
                    </form>
                
                    <!--タスクを削除する-->
                    <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="mx-2 my-2 px-3 py-1 text-red-500 border border-red-500 font-semibold rounded hover:bg-gray-100" type="button" onclick="deleteTask({{ $task->id }})">削除</button>
                    </form>
                    
                </div>
                <br>
                
            @endforeach
        </div><br>
        
    <!--完了タスク一覧-->
        <div class='dones'>
            <p class="text-3xl  font-bold">完了タスク一覧</p><br>
            @foreach ($dones as $done)
                <div class='dones'>
                    <h2 class='font-lg'>
                    <a class ="text-xl" "underline decoration-slate-50" href="/tasks/{{ $done->id }}">{{ $done->title }}</a>
                    </h2>
                    <p class='font-base'>{{ $done->body }}</p>
                    <form action="/tasks/{{ $done->id }}" id="form_{{ $done->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class='px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100' type="button" onclick="deleteTask({{ $done->id }})">削除</button>
                    
                    </form>
                 
                </div>
                <br>
            @endforeach
            
        </div>
        
    </body>
    <script>
        function deleteTask(id){
            'use strict'
            
            if(confirm ('削除すると復元できません \n本当に削除しますか？'))
                document.getElementById(`form_${id}`).submit();
        }
    </script>
</html>

</x-app-layout>