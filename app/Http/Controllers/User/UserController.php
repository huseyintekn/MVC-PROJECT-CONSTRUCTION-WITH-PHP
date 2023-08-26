<?php

namespace App\Http\Controllers\User;

use App\Http\Request\Request;

class UserController
{
    public function index()
    {
        return view("user/list");
    }

    public function create()
    {
        return view("user/form");
    }

    public function store(Request $request)
    {
        $data = $request->all();

        return json_encode($data);
    }
}