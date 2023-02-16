        <x-app-layout>
            <h3 class= 'text-xl'>タイムライン</h3><br>
                @foreach ($tasks as $task)
                    @if ($task->status == 0)
                            <p class = "new_tasks" >新しいタスク、 「{{ $task->title }}」 が追加されました</p>
                            <p>{{$task->updated_at}}</p>
                            <br>
                    @else
                            <p class = "done_tasks" >「{{ $task->title }}」 が完了されました</p>
                            <p>{{$task->updated_at}}</p>
                            <br>
                    @endif
                @endforeach
                
                
         </x-app-layout>
         <!--完了・未完了タスク全体を日付降順で並べたい-->
         <!--ただし、文言はそれぞれ変えたい-->
         <!--paginatorとtailwindCSSを併用する場合に注意することはある？--> 