<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlowController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
       return "订单提交页面";
    }
}
