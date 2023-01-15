<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='title'>
                <input type='text' name='task[title]' value="{{ $task->title }}">
            <div class='points'>
                <input type="number" name="task[point]" value="{{ $task->point }}">
            </div>
            <div class='body'>
                <input type='text' name='task[body]' value="{{ $task->body }}">
            </div>
            <input type="submit" value="store">
        </form>
    </div>
</body>