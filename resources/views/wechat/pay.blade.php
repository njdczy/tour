@include('wechat.layouts.header')
<button type="submit" class="weui-btn weui-btn_primary" onclick="callpay()">微信支付</button>
<script type="text/javascript">
    {{--function callpay() {--}}
        {{--wx.chooseWXPay({--}}
            {{--timestamp: '{{$pay['timestamp']}}',--}}
            {{--nonceStr: '{{$pay['nonceStr']}}',--}}
            {{--package: '{{$pay['package']}}',--}}
            {{--signType: '{{$pay['signType']}}',--}}
            {{--paySign: '{{$pay['paySign']}}', // 支付签名--}}
            {{--success: function (res) {--}}
                {{--alert('支付成功');--}}
            {{--}--}}
        {{--});--}}
    {{--}--}}

    function jsApiCall() {
        WeixinJSBridge.invoke("getBrandWCPayRequest", {!! $pay !!}, function (res) {
            if (res.err_msg == "get_brand_wcpay_request:ok") {
                alert('支付成功');
            } else if (res.err_msg == 'get_brand_wcpay_request:fail'){
                alert('支付失败');
            }
        })
    }

    function callpay() {
        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener("WeixinJSBridgeReady", jsApiCall, false);
            } else if (document.attachEvent) {
                document.attachEvent("WeixinJSBridgeReady", jsApiCall);
                document.attachEvent("onWeixinJSBridgeReady", jsApiCall);
            }
        } else {
            jsApiCall();
        }
    }
</script>