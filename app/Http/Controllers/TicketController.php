<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
        use SoftDeletes;
        public function index(Ticket $ticket)
    {
        $tickets = $ticket->where('status',0)->get();
        $dones = $ticket->where('status',1)->get();
        return view('tickets/index')->with(['tickets' => $tickets,'dones'=>$dones]);  
    }
        public function create(){
            return view('tickets/create');
        }
        
        public function show (Ticket $ticket){
            return view('tickets/show')->with(['ticket'=>$ticket]);
        }
        
        public function store(Request $request, Ticket $ticket){
            //dd(チケットの中身)で調べてみる
            $input = $request['ticket'];
            $ticket->fill($input)->save();
            $tickets = $ticket->where('status',0)->get();
            $dones = $ticket->where('status',1)->get();
            return view('tickets/index')->with(['tickets' => $tickets,'dones'=>$dones]);
            
        }
        public function edit(Ticket $ticket){
            return view('tickets/edit')->with(['ticket' => $ticket]);
        }
            
        public function update(Request $request, Ticket $ticket, User $user){
            //dd($request->status); //status確認用
            
            //「編集する」ボタンをおしたとき
            if ($request->status === null) {
                $input_post = $request['ticket'];
                $ticket->fill($input_post)->save();
                
            } else {
                 //「使用する」ボタンを押したとき
                $user = Auth::user();
                $user_id= $user->id;
                $identity = User::find($user_id);
                $identity->point = $ticket->point;
                $identity->save();
                
                  //該当のタスクを検索
                  // = Task::find($id);
                  //モデル->カラム名 = 値 で、データを割り当てる
                  $ticket->status = 1; //1:完了、0:未完了
                  //データベースに保存
                  $ticket->save();
            }
            //リダイレクト
            $tickets = $ticket->where('status',0)->get();
            $dones = $ticket->where('status',1)->get();
            return view('tickets/index')->with(['tickets' => $tickets,'dones'=>$dones]);  
            
        }
            
        public function delete(Ticket $ticket){
            $ticket->delete();
            $tickets = $ticket->where('status',0)->get();
            $dones = $ticket->where('status',1)->get();
            return view('tickets/index')->with(['tickets' => $tickets,'dones'=>$dones]);  
        }
}
