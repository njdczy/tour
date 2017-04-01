<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

class Wechatcontroller extends Controller
{
    protected $wechat;

    public function __construct()
    {
        $this->wechat = app('wechat');
    }
}
