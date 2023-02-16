<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
    {
        use SoftDeletes;
        
 
        public function index(Task $task)
    {
        $tasks = $task->where('status',0)->get();
        $dones = $task->where('status',1)->get();
        $point = $task->point;
        return view('tasks/index')->with(['tasks' => $tasks,'dones'=>$dones,'point'=>$point]);  
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
            
        public function update(Request $request, Task $task, User $user){
            //dd($request->status); //status確認用
            
            //「編集する」ボタンをおしたとき
            if ($request->status === null) {
                $input_task = $request['task'];
                $task->fill($input_task)->save();
                
            } else {
                 //「完了」ボタンを押したとき
                $user = Auth::user();
                $task->user_id=$user->id;
                $user_id= $user->id;
                $identity = User::find($user_id);
                $identity->point = $task->point;
                $identity->save();
                
                  //該当のタスクを検索
                  // = Task::find($id);
                  //モデル->カラム名 = 値 で、データを割り当てる
                  $task->status = 1; //1:完了、0:未完了
                  //データベースに保存
                  $task->save();
                  dd($task->user_id);
            }
            //リダイレクト
            return view('tasks/index')->with(['user'=>$user,'tasks'=>$tasks,'dones'=>$dones,'point'=>$point]);
            
        }
            
        public function delete(Task $task){
            $task->delete();
            return redirect('/');
        }
        
    
        
}