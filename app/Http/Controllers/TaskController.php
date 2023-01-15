<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Database\Eloquent\SoftDeletes;


class TaskController extends Controller
    {
        use SoftDeletes;
        
        public function index(Task $task)
    {
        $tasks = $task->where('status',0)->get();
        $dones = $task->where('status',1)->get();
        return view('tasks/index')->with(['tasks' => $tasks,'dones'=>$dones]);  
    }
        public function create(){
            return view('tasks/create');
        }
        
        public function show (Task $task){
            return view('tasks/show')->with(['task'=>$task]);
        }
        
        public function store(Request $request, Task $task){
            $input = $request['task'];
            $task->fill($input)->save();
            return redirect('/');
            
        }
        public function edit(Task $task){
            return view('tasks/edit')->with(['task' => $task]);
        }
            
        public function update(Request $request, Task $task){
            //dd($request->status);//追記
            
              //「編集する」ボタンをおしたとき
            if ($request->status === null) {
                $input_post = $request['post'];
                $post->fill($input_post)->save();
                
            } else {
                 //「完了」ボタンを押したとき
              
                  //該当のタスクを検索
                  // = Task::find($id);
                  //モデル->カラム名 = 値 で、データを割り当てる
                  $task->status = 1; //1:完了、0:未完了
                  //データベースに保存
                  $task->save();
        }
      
      
        //リダイレクト
        return redirect('/');
            
        }
            
        public function deleteTask(Task $task){
            $task->delete();
            return redirect('/');
        }
        
    
        
}