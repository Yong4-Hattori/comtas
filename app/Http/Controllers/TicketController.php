<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
        use SoftDeletes;
        public function index(Ticket $ticket,User $user)
    {
        $user = Auth::user();
        $user_id= $user->id;
        $tickets = $ticket->where('status',0)->get();
        $dones = $ticket->where('status',1)->get();
        $user_point = $user->point;
        $ticket_point = $ticket->point;
        return view('tickets/index')->with(['user'=> $user,'tickets' => $tickets,'dones'=>$dones,
        'user_point'=> $user_point,'ticket_point'=>$ticket_point]);  
    }
        public function create(){
            return view('tickets/create');
        }
        
        public function show (Ticket $ticket){
            return view('tickets/show')->with(['ticket'=>$ticket]);
        }
        
        public function store(TicketRequest $request, Ticket $ticket,User $user){
            $input = $request['ticket'];
            $ticket->fill($input)->save();
            
            $tickets = $ticket->where('status',0)->get();
            $dones = $ticket->where('status',1)->get();
            
            $user = Auth::user();
            $user_point = $user->point;
            $ticket_point = $ticket->point;
            
            return view('tickets/index')->with(['user'=> $user,'tickets' => $tickets,'dones'=>$dones,
                        'user_point'=> $user_point,'ticket_point'=>$ticket_point]);   
            
        }
        public function edit(Ticket $ticket){
            return view('tickets/edit')->with(['ticket' => $ticket]);
        }
            
        public function update(Request $request, Ticket $ticket){
            //dd($request->status); //status確認用
            
            //「編集する」ボタンをおしたとき
            if ($request->status === null) {
                $input_post = $request['ticket'];
                $ticket->fill($input_post)->save();
                
            } else {
                 //「使用する」ボタンを押したとき
                 
                //user情報取得
                $user = Auth::user();
                
                //チケットのpointを取得 OK
                $ticket_id = $ticket->id;
                $ticket_point = Ticket::where('id',$ticket_id)->first()->point;
     
                //ticketsのpointとボタンを押したusersのポイントで差をとる
                
                $ticket->user_id = $user->id;
                $user->point = $user->point-$ticket_point;
                
               
                $ticket->status = 1; //1:使用済み,2:未使用
                  //データベースに保存
                $ticket->save();
                $user->save();
     

            }
        
            //リダイレクト
            $tickets = $ticket->where('status',0)->get();
            $dones = $ticket->where('status',1)->get();
            $user_point = $user->point;
            $ticket_point = $ticket->point;
            return view('tickets/index')->with(['user'=> $user,'tickets' => $tickets,'dones'=>$dones,
            'user_point'=> $user_point,'ticket_point'=>$ticket_point]);  
            
        }
            
        public function delete(Ticket $ticket, User $user){
            $user = Auth::user();
            $ticket->delete();
            $tickets = $ticket->where('status',0)->get();
            $dones = $ticket->where('status',1)->get();
            $user_point = $user->point;
            $ticket_point = $ticket->point;
            return view('tickets/index')->with(['user'=> $user,'tickets' => $tickets,'dones'=>$dones,
             'user_point'=> $user_point,'ticket_point'=>$ticket_point]);  
        }
}
