<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContect;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class Messages extends BackEndController
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }

    public function replay($id, Store $request) {
        $message = $this->model->find($id);
        Mail::send(new ReplayContect($message, $request->message));
        return redirect()->route('messages.edit', ['id'=> $message->id]);
    }
}
