@include('wechat.layouts.header')
<a class="box-flex btn-submit" type="button" onclick="callpay()">微信支付</a>
<script type="text/javascript">
    function callpay() {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest', {{$json}},
            function (res) {
                if (res.err_msg == "get_brand_wcpay_request:ok") {
                    // 使用以上方式判断前端返回,微信团队郑重提示：
                    // res.err_msg将在用户支付成功后返回
                    // ok，但并不保证它绝对可靠。
                    alert('支付成功');
                }
            }
        );
    }
</script>