<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'name',
        'user_id',
        'id',
        'task_id',
     ];
}
