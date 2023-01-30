<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>ホーム</title>
            <link rel="stylesheet" href="/public/createTask.css">
            
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <a href='/tickets/create'>チケットを追加する</a>
            
            
        <!--チケット一覧-->
            <h3>チケット一覧</h3>
            <div class='tickets'>
                @foreach ($tickets as $ticket)
                    <div class='tickets'>
                        <h2 class='ticket_title'>
                        <a href="/tickets/{{ $ticket->id }}">{{ $ticket->title }}</a>
                        </h2>
                        <p class='ticket_body'>{{ $ticket->body }}</p>
                        
                        <!--チケットを使用する-->
                        <form action="/tickets/{{ $ticket->id }}" id="form_{{ $ticket->id }}/updateStatus" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="{{$ticket->status}}">
                         <button type="submit">使用する</button>
                         </form>
                         
                        <!--チケットを削除する-->
                        <form action="/tickets/{{ $ticket->id }}" id="form_{{ $ticket->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteTicket({{ $ticket->id }})">削除</button>
                        </form>
                    </div>
                @endforeach
            </div>
            
        <!--使用済チケット一覧-->
            <div class='dones'>
                <h3>使用済みチケット一覧</h3>
                @foreach ($dones as $done)
                    <div class='dones'>
                        <h2 class='ticket_title'>
                        <a href="/ticket/{{ $done->id }}">{{ $done->title }}</a>
                        </h2>
                        <p class='ticket_body'>{{ $done->body }}</p>
                        <form action="/tickets/{{ $done->id }}" id="form_{{ $done->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteTicket({{ $done->id }})">削除</button>
                        </form>
                    </div>
                @endforeach
            </div>
            
        </body>
        <script>
            function deleteTicket(id){
                'use strict'
                
                if(confirm ('削除すると復元できません \n本当に削除しますか？'))
                    document.getElementById(`form_${id}`).submit();
            }
        </script>
    </html>
