<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Payment\Order;


use App\Order as ori;
class PayController extends Controller
{
    public function index(Request $request)
    {
        $order_id = session('order_id');
        $order = ori::findOrFail($order_id);

        $wechat = app('wechat');

        $attributes = [
            'trade_type'       => 'JSAPI', // JSAPI，NATIVE，APP...
            'body'             => $order->trip_name . "(" .  $order->triplist_name .")",
            'detail'           => $order->trip_name . "(" .  $order->triplist_name .")",
            'out_trade_no'     => $order->id .'ordersn'.$order->user_id,
            'total_fee'        => $order->need_total*100, // 单位：分
            'notify_url'       => 'http://tour.njdczy.com/wechat/notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid'           => session('wechat_user')['original']['openid']
            // ...
        ];
        $order = new Order($attributes);
        $result = $wechat->payment->prepare($order);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
        }
        $config = $wechat->payment->configForPayment($prepayId); // 返回 json 字符串，如果想返回数组，传第二个参数 false
        //$config = $wechat->payment->configForJSSDKPayment($prepayId); // 返回数组
        return view("wechat.pay", ['pay' => $config]);
    }
}