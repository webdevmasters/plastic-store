<?php


namespace App\Repositories\repositories;


use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Repositories\interfaces\MessageInterface;

class MessageRepository implements MessageInterface {

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
