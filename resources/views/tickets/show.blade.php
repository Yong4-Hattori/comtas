<x-app-layout>
        <body>
            <div class="ticket_title"> タイトル：{{ $ticket->title }} </div>
            <p> ポイント：{{ $ticket->point }}</p>
            <div class="ticket_body"> 詳細：{{ $ticket->body }}</div>
          
            <br>
            <div class="edit"><a href="/tickets/{{ $ticket->id }}/edit">編集</a></div>
            <a href="/">戻る</a>
            
            </div>
        </body>
    </html>
</x-app-layout>