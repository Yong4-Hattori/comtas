        <x-app-layout>
            <p class = "text-xl flex justify-center items-center" >タイムライン</h3><br><br>
                @foreach ($tasks as $task)

                    @if ($task->status == 0)
                            <p class = "flex justify-center items-center" >{{$task->add_user}}が、 新しいタスク、 「{{ $task->title }}」 が追加されました</p>
                            <p class = "flex justify-center items-center" >{{$task->updated_at}}</p>
                            <a href="/line/message/{{$task->id}}">LINEでシェア</a>
                            <br>
                    @else
                            <p class = "flex justify-center items-center" >{{$task->done_user}} が 「{{ $task->title }}」 を完了しました！</p>
                            <p class = "flex justify-center items-center" >{{$task->updated_at}}</p>
                            <a href="/line/message/{{$task->id}}">LINEでシェア</a>
                            <br>
                    @endif
                @endforeach

         </x-app-layout>
