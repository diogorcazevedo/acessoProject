<?php

namespace AcessoProject\Http\Controllers;

use Illuminate\Http\Request;

use AcessoProject\Http\Requests;
use AcessoProject\Http\Controllers\Controller;
use AcessoProject\Client;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }


    public function store(Request $request)
    {
        return Client::create($request->all());
    }
}
