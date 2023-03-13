        <x-app-layout>
            <p class="text-3xl font-bold">タイムライン</p><br>
                @foreach ($tasks as $task)

                    @if ($task->status == 0)
                            <p class = "text-lg">{{$task->add_user}}が、 新しいタスク、 「{{ $task->title }}」 が追加されました</p>
                            <p class = "text-sm">{{$task->updated_at}}</p>
                            <a href="/line/message/{{$task->id}}"><img src="https://www.line-website.com/social-plugins/img/common/square-default-small.png"width="20" height="20" alt="LINEリンク"></a>
                            <br>
                    @else
                            <p class = "text-lg" >{{$task->done_user}} が 「{{ $task->title }}」 を完了しました！</p>
                            <p class = "text-sm" >{{$task->updated_at}}</p>
                            <a href="/line/message/{{$task->id}}"><img src="https://www.line-website.com/social-plugins/img/common/square-default-small.png"width="20" height="20" alt="LINEリンク"></a>
                            <br>
                    @endif
                @endforeach

         </x-app-layout>
