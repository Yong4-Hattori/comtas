<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'title',
    'point',
    'body',
    
];
    public function rules()
    {
        return [
            'task.title' => 'required|string|max:100',
            'task.body' => 'required|string|max:500',
        ];
    }
}
