<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

 
class TimelineController extends Controller
{
        public function index (Task $task,TaskUser $task_user)
    {
        $tasks = $task->setUser();

        return view('timelines/index')->with(['tasks' => $tasks]);
    }
}