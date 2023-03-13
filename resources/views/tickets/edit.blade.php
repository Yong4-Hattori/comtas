<x-app-layout>
         <h1 name="ticket_edit" class="text-3xl font-bold">チケットを編集する</h1><br>
        <div class="content">
            <form action="/tickets/{{ $ticket->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='ticket_title'>
                    <input type='text' name='ticket[title]' value="{{ $ticket->title }}">
                <div class='ticket_points'>
                    <input type="number" name="ticket[point]" value="{{ $ticket->point }}">
                </div>
                <div class='ticket_body'>
                    <input type='text' name='ticket[body]' value="{{ $ticket->body }}"><br>
                </div>
                <button class="mx-2 my-3 px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100" type="submit" value="store">保存</button>
            </form>
        </div>
</x-app-layout>

