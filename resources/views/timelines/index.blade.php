        <x-app-layout>
            <p class = "text-xl flex justify-center items-center" >タイムライン</h3><br><br>
                @foreach ($tasks as $task)
                    @if ($task->status == 0)
                            <p class = "flex justify-center items-center" >新しいタスク、 「{{ $task->title }}」 が追加されました</p>
                            <p class = "flex justify-center items-center" >{{$task->updated_at}}</p>
                            <br>
                    @else
                            <p class = "flex justify-center items-center" >「{{ $task->title }}」 が完了されました</p>
                            <p class = "flex justify-center items-center" >{{$task->updated_at}}</p>
                            <br>
                    @endif
                @endforeach

         </x-app-layout>
         <!--完了・未完了タスク全体を日付降順で並べたい-->
         <!--ただし、文言はそれぞれ変えたい-->
         <!--paginatorとtailwindCSSを併用する場合に注意することはある？--> 