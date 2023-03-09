<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{

    public function rules()
    {
                return [
            'ticket.title' => 'required|string|max:100',
            'ticket.point'=> 'required|integer',
            'ticket.body' => 'required|string|max:300'];
    }
}
