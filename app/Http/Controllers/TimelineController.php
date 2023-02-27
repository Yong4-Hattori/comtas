<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

 
class TimelineController extends Controller
{
        public function index (Task $task)
    {
        //$tasks = $task->where('status',0)->orderBy('updated_at', 'DESC')->get();
        //$dones = $task->where('status',1)->orderBy('updated_at', 'DESC')->get();
        $tasks = $task->orderBy('updated_at', 'DESC')->get();
        
        return view('timelines/index')->with(['tasks' => $tasks]);
    }
}