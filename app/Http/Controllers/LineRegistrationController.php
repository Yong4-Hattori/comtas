<?php

namespace App\Http\Controllers;

use App\Models\LineUser;
use Illuminate\Http\Request;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\Models\User;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use App\Models\Task;



class LineRegistrationController extends Controller
{
    // メッセージ送信用
 public function message(Task $task) {
 
        // LINEBOTSDKの設定
        $http_client = new CurlHTTPClient(config('services.line.channel_token'));
        $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);
        
        $task_title = $task->title;
        
        //メッセージ設定
        $message =  "$task_title が完了されました!";
        $textMessageBuilder = new TextMessageBuilder($message);
        
        //追加している人全員に送る処理
        $line_users = LineUser::all();
        foreach($line_users as $line_user) {
            $userId = $line_user['line_id'];

            // メッセージ送信
            $response = $bot->pushMessage($userId, $textMessageBuilder);
        }
        
        return view(タイムライン);
 
    }

    //文字列を送られてきたときの処理
    public function webhook(Request $request) {


         // LINEから送られた内容を$inputsに代入
        $inputs=$request->all();
 
        // そこからtypeをとりだし、$message_typeに代入
        $message_type=$inputs['events'][0]['type'];
 
        // メッセージが送られた場合、$message_typeは'message'となる。その場合処理実行。
        if($message_type=='message') {
            
            // replyTokenを取得
            $reply_token=$inputs['events'][0]['replyToken'];
            
            $http_client = new CurlHTTPClient(config('services.line.channel_token'));    
            $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);
 
             // 送信するメッセージの設定
            $reply_message='メッセージありがとうございます';
 
            // ユーザーにメッセージを返す
            $reply=$bot->replyText($reply_token, $reply_message);
            
            // 送り主のLINEのユーザーIDをuserIdに代入、取得
            $userId=$request['events'][0]['source']['userId'];

            // userIdがあるユーザーを検索
            $user=LineUser::where('line_id', $userId)->first();

            // もし見つからない場合は、データベースに保存
            if($user==NULL) {
                $profile=$bot->getProfile($userId)->getJSONDecodedBody();

                $user=new LineUser();
                $user->mode='active';
                $user->line_id=$userId;
                $user->name=$profile['displayName'];
                $user->save();
            }
            
            return 'ok';
        }
    }
    
}