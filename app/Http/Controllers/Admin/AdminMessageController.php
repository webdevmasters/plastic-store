<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MessageAnswered;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class AdminMessageController extends Controller {

    public function index() {
        return view('admin.message.index')->with('messages', Message::all());
    }

    public function destroy($id) {
        Message::destroy($id);

        return redirect()->route('admin.messages.index');
    }

    public function answer($id, $result) {
        $message = Message::findOrFail($id);
        Mail::to($message->email)->send(new MessageAnswered($result));
        Message::where('id', $id)->update(['answered' => true]);

        return redirect()->route('admin.messages.index');
    }
}
