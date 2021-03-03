<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Repositories\interfaces\MessageInterface;

class MessageController extends Controller {

    public $messageRepository;

    public function __construct(MessageInterface $messageRepository) {
        $this->messageRepository = $messageRepository;
    }

    public function contact() {
        return $this->messageRepository->contact();
    }

    public function sendMessage(MessageRequest $request) {
        return $this->messageRepository->sendMessage($request);
    }
}
