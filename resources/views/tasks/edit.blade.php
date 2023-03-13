<!-- body内だけを表示しています。 -->
<x-app-layout>
    <body>
        <h1 name="task_edit" class="text-3xl font-bold">タスクを編集する</h1><br>
        <div class="content">
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='task_title'>
                    <input type='text' name='task[title]' value="{{ $task->title }}">
                <div class='points'>
                    <input type="number" name="task[point]" value="{{ $task->point }}">
                </div>
                <div class='task_body'>
                    <input type='text' name='task[body]' value="{{ $task->body }}">
                </div>
                <button class="mx-2 my-3 px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100" type="submit" value="store">保存</button>
            </form>
        </div>
    </body>
</x-app-layout>
