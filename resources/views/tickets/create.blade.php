<x-app-layout>

    <body>
        <p class="text-3xl font-bold">チケットを追加する</p><br>
        
        
        @if ($errors->any())
        <div class="alert alert-danger" style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!--入力フォーム-->
        <div class="mt-8">
            <form class="w-10/12 mx-auto md:max-w-md" action="/tickets" method="POST">
                @csrf

                <div class="mb-8">
                    <input type="text" name="ticket[title]"
                        　class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                        placeholder="タイトル" value="{{ old('ticket.title') }}">
                </div>

                <div class="mb-8">
                    <input type="number" name="ticket[point]"
                        class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"
                        placeholder="ポイント 例: 100" value="{{ old('ticket.point') }}">
                </div>

                <div class="mb-8">
                    <textarea name="ticket[body]" placeholder="詳細" value="{{ old('ticket.body') }}" cols="30" rows="8"
                        class="w-full py-2 border-b focus:outline-none focus:border-b-2 focus:border-indigo-500 placeholder-gray-500 placeholder-opacity-50"></textarea>
                </div>

               <button class="px-2 py-1 text-blue-500 border border-blue-500 font-semibold rounded hover:bg-blue-100" type="submit" value="store">保存</button><br>
               
               
            </form>
        </div>
   
            <br><a href="/">戻る</a>

    </body>

    </html>
</x-app-layout>