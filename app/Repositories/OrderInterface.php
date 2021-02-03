<?php


namespace App\Repositories;


use App\Http\Requests\OrderRequest;

interface OrderInterface {

    public function store(OrderRequest $request);
    public function create();
    public function show($id);
    public function cancel($id);

}
