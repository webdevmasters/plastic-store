<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {

    public function contact() {
        return view('webapp.shop.contact');
    }

    public function sendMessage(MessageRequest $request) {
        Message::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('message', 'Hvala na Vašem pitanju. Potrudićemo se da odgovorimo u najkraćem roku!');
    }
}
