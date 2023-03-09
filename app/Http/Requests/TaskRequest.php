<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules (){
        
        return [
            'task.title' => 'required|string|max:100',
            'task.point'=> 'required|integer',
            'task.body' => 'required|string|max:300'];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
}
