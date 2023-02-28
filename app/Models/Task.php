<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'title',
    'point',
    'body',
    'user_id',
    'add_user',
    'done_user',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function abc(){
        return $this::with('user')->orderBy('updated_at', 'DESC')->get();
    }
}
