<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/tickets/{{ $ticket->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='ticket_title'>
                <input type='text' name='ticket[title]' value="{{ $ticket->title }}">
            <div class='points'>
                <input type="number" name="ticket[point]" value="{{ $ticket->point }}">
            </div>
            <div class='ticket_body'>
                <input type='text' name='ticket[body]' value="{{ $ticket->body }}">
            </div>
            <input type="submit" value="store">
        </form>
    </div>
</body>
