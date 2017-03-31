<?php

namespace App\Http\Controllers;


class Wechatcontroller extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {

        $wechat = app('wechat');

        return $wechat->server->serve();
    }
}
