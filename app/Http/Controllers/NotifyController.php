<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 11:26
 */

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Log;

class NotifyController extends Controller
{
    public function index()
    {
        $wechat = app('wechat');
        $response = $wechat->payment->handleNotify(function($notify, $successful){
            Log::debug('out_trade_no.', ['out_trade_no' => $notify->out_trade_no]);
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $arr = preg_split("/([a-zA-Z0-9]+)/", $notify->out_trade_no, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $order = Order::find($arr[0]);
            Log::debug('order.', $arr);
            if (!$order) { // 如果订单不存在
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            // 如果订单存在
            // 检查订单是否已经更新过支付状态
            if ($order->is_payed) { // 假设订单字段“支付时间”不为空代表已经支付
                return true; // 已经支付成功了就不再更新了
            }
            // 用户是否支付成功
            if ($successful) {
                // 不是已经支付状态则修改为已经支付状态
                $order->is_payed = 1;
                $order->pay_type = 1;
                $order->save(); // 保存订单
            } else { // 用户支付失败

            }
            return true; // 返回处理完成
        });
        return $response;
    }
}