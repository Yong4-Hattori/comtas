<!--
<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>ホーム</title>
            <link rel="stylesheet" href="/public/createTask.css">
            
            <!-- Fonts -->
           <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        -->
        <x-app-layout>
            <!--所有ポイント-->
            
            
            <div class = 'user_point'>
                
            <p> あなたは{{$user_point}}  ポイント所有しています</p><br>
        </div>
        <body>
            <a href='/'>タスク一覧</a><br>
            <a href='/tickets/create'>チケットを追加する</a><br>
            <a href='/timelines'>タイムライン</a><br><br>
            
            
        <!--チケット一覧-->
            <h3>チケット一覧</h3>
            <div class='tickets'>
                @foreach ($tickets as $ticket)
                    <div class='tickets'>
                        <h2 class='ticket_title'>
                        <a href="/tickets/{{ $ticket->id }}">{{ $ticket->title }}</a>
                        </h2>
                        <p class='ticket_body'>{{ $ticket->body }}</p>
                        <p class='point'>{{$ticket->point}}ポイント</p>
                        
                        <!--チケットを使用する-->
                        <form action="/tickets/{{ $ticket->id }}" id="form_{{ $ticket->id }}/updateStatus" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{$ticket->status}}">
                        <button type="button" onclick="useTicket({{ $ticket->point}},{{$user->point}},{{$ticket->id }})">使用する</button>
                        
                         </form>
                         
                        <!--チケットを削除する-->
                        <form action="/tickets/{{ $ticket->id }}" id="form_{{ $ticket->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class='px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100' type="button" onclick="deleteTicket({{ $ticket->id }})">削除</button>
                        </form>
                    </div>
                    <br>
                @endforeach
            </div>
            
        <!--使用済チケット一覧-->
            <div class='dones'>
                <h3>使用済みチケット一覧</h3>
                @foreach ($dones as $done)
                    <div class='dones'>
                        <h2 class='ticket_title'>{{ $done->title }}</h2>
                        </h2>
                        <p class='ticket_body'>{{ $done->body }}</p>
                        <form action="/tickets/{{ $done->id }}" id="form_{{ $done->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class='px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100' type="button" onclick="deleteTicket({{ $done->id }})">削除</button>
                        </form>
                    </div>
                    <br>
                @endforeach
            </div>
        </x-app-layout>
            
        </body>
        <script>
        const user_point = @json($user_point);
        const ticket_point = @json($ticket_point);
            function deleteTicket(id){
                'use strict'
                
                if(confirm ('削除すると復元できません \n本当に削除しますか？'))
                    document.getElementById(`form_${id}`).submit();
            }
            

            function useTicket(ticket_point,user_point,id){
               if(ticket_point >= user_point){
                    alert('ポイントが不足しています!')
                }else{
                     document.getElementById(`form_${id}/updateStatus`).submit();
                }
            }
        </script>
    </html>

