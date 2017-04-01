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

        $wechat->setMessageHandler(function ($message) {
            return "您好！欢迎关注成会玩!";
        });
        return $wechat->server->serve();
    }
}
