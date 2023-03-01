<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{

    public function rules()
    {
        return [
        'title' => 'required|string|max:100',
        'point' => 'required|integer',
        'body' => 'required|string|max:4000',
        ];
    }
}
