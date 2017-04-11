<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Trip;

class FromController extends Controller
{
    public function index($id)
    {
        $trip = Trip::findOrFail($id);

        return view("wechat.from",compact('trip'));
    }
}
