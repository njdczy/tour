<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0" name="viewport"/>
    <meta content="telephone=no" name="format-detection"/>
    <meta content="address=no" name="format-detection"/>
    <meta name="apple-mobile-web-app-capable" content="no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>大成致远-亲子游</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="HOMOLO">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <link rel="apple-touch-icon-precomposed" href="" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/modules.css') }}" />
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body id="index">

    <div class="topbar">
        <div class="clearfix wrapper">
            <div class="pull-right">
                <ul class="links">
                    <li><a href="#">登录</a> | <a href="">注册</a></li>
                    <li><a href="#"><i class="iconfont icon-wechat"></i>微信</a></li>
                    <li><a href="#"><i class="iconfont icon-weibo"></i>微博</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header start -->
    <div class="header">
        <div class="wrapper clearfix">
            <div class="pull-left">
                <div class="logo">
                    <img src="/images/logo.png" alt="">
                </div>
            </div>
            <div class="pull-right">
                <ul class="links">
                    <li class="active"><a href="index.html">主页</a></li>
                    <li><a href="cmw.html">出门玩</a></li>
                    <li><a href="gzw.html">各种玩</a></li>
                    <li><a href="dsw.html">动手玩</a></li>
                    <li><a href="wzd.html">玩真的</a></li>
                    <li><a href="#">卖着玩</a></li>
                </ul>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="footer">
        <div class="panel">
            <div class="wrapper">
                <div class="panel-header">
                    <img src="images/wzd.png" alt="">
                </div>
                <div class="panel-content clearfix">
                    <div class="col-3">
                        <ul>
                            <li><a href="#">2017年，中国旅游将走向何方？</a></li>
                            <li><a href="#">今年春节蜜月游，出境游将成首选!</a></li>
                            <li><a href="#">中国春节引爆全球黄金周，OTA比拼落足定制旅游</a></li>
                            <li><a href="#">寒假、春节选择邮轮亲子游的五大理由!</a></li>
                            <li><a href="#">中国春节引爆全球黄金周，OTA比拼落足定制旅游</a></li>
                            <li><a href="#">寒假、春节选择邮轮亲子游的五大理由!</a></li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul>
                            <li><a href="#">2017年，中国旅游将走向何方？</a></li>
                            <li><a href="#">今年春节蜜月游，出境游将成首选!</a></li>
                            <li><a href="#">中国春节引爆全球黄金周，OTA比拼落足定制旅游</a></li>
                            <li><a href="#">寒假、春节选择邮轮亲子游的五大理由!</a></li>
                            <li><a href="#">中国春节引爆全球黄金周，OTA比拼落足定制旅游</a></li>
                            <li><a href="#">寒假、春节选择邮轮亲子游的五大理由!</a></li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul>
                            <li><a href="#">2017年，中国旅游将走向何方？</a></li>
                            <li><a href="#">今年春节蜜月游，出境游将成首选!</a></li>
                            <li><a href="#">中国春节引爆全球黄金周，OTA比拼落足定制旅游</a></li>
                            <li><a href="#">寒假、春节选择邮轮亲子游的五大理由!</a></li>
                            <li><a href="#">中国春节引爆全球黄金周，OTA比拼落足定制旅游</a></li>
                            <li><a href="#">寒假、春节选择邮轮亲子游的五大理由!</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="links">
            <ul>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">联系我们</a></li>
                <li><a href="#">隐私条款</a></li>
                <li><a href="#">网站地图</a></li>
                <li><a href="#">加入我们</a></li>
            </ul>
        </div>
        <div class="contact">
            <ul>
                <li>咨询电话</li>
                <li class="way">025-400-2554851</li>
                <li>商务合作</li>
                <li class="way">njdczy@qq.com</li>
                <li>投资建议</li>
                <li class="way">（025）4154454（工作日10:00-17:00）</li>
            </ul>
        </div>

        <div class="copyright">
            <p>copyright @ 2017 亲子游 All  rights  reserved.</p>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


