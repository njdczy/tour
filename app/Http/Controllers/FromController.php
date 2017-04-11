<?php

namespace App\Http\Controllers;


use App\Http\Requests\FormRequest;
use Illuminate\Http\Request;

use App\Trip;

class FromController extends Controller
{
    public function index($id)
    {
        $trip = Trip::findOrFail($id);

        return view("wechat.from",compact('trip'));
    }


    public function store($id, FormRequest $request)
    {
        $data = array_merge($request->all(), [
            'user_id' => \Auth::id(),
            'trip_id' => $id
        ]);

        return $data;
    }


}
