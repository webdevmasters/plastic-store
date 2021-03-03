<?php


namespace App\Repositories\interfaces;


use App\Http\Requests\MessageRequest;

interface MessageInterface {

    public function contact();

    public function sendMessage(MessageRequest $request);

}
