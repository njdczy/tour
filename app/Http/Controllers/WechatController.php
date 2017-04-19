<?php

namespace App\Http\Controllers;


class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {

        $wechat = app('wechat');
        $server = $wechat->server;
        $server->setMessageHandler(function($message){
            // 注意，这里的 $message 不仅仅是用户发来的消息，也可能是事件
            // 当 $message->MsgType 为 event 时为事件
            if ($message->MsgType == 'event') {
                # code...
                switch ($message->Event) {
                    case 'subscribe':
                        return "您好！欢迎关注“成会玩club”!";
                        break;
                    default:
                        # code...
                        break;
                }
            }
        });
        return $server->serve();
    }
}
