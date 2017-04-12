@include('wechat.layouts.header')

<body>
<div class="weui-toptips weui-toptips_warn js_tooltips" @if (count($errors) > 0)style="display: block;"
     @else style="display: none;" @endif>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                <li>{{ $errors->first()}}</li>
            </ul>
        </div>
    @endif
</div>
<div class="container">
    <p class="head-title">{{$trip->name}}—报名表</p>
    <p class="subtitle">请认真填写表单</p>

    <form method="post" action="/form/{{ $trip->id }}" name="person">
        <div class="adds">
            @include('wechat.form.child')
        </div>
        <div class="Btns">
            <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary more">+</a>
            <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary reduce">-</a>
        </div>

        @include('wechat.form.parent')
        @include('wechat.form.time')
        <div class="page__bd page__bd_spacing">
            <button type="submit" class="weui-btn weui-btn_primary">提交</button>
        </div>
        {{ csrf_field() }}
    </form>
</div>

</body>




<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
    function createEles() {
        var index = $('.adds').prev().index();
        index++;
        var html = "<h3 class='Info'>小朋友信息(" + index + ")</h3>" + '<div class="weui-cells__title">小朋友姓名 <span> *</span></div>' +
            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="小朋友姓名" value="" name="inputChild[]"></div></div></div>'
            + '<div class="weui-cells__title">证件号码 <span> *</span></div>' +
            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="证件号码" value="" name="inputID[]"></div></div></div>'
            + '<div class="weui-cells__title">身高<span> *</span></div>' +
            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="身高" value="" name="inputHeight[]"></div></div></div>'
            + '<div class="weui-cells__title">体重（kg）<span> *</span></div>' +
            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="体重" value="" name="inputWeight[]"></div></div></div>'
            + '<div class="weui-cells__title">所在学校<span> *</span></div>' +
            '<div class="weui-cells"><div class="weui-cell"><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool[]"></div></div></div>'
        ;
        var Adds = document.createElement('div');
        Adds.className = 'adds';
        Adds.innerHTML = html;
        $(Adds).insertBefore($(".Btns"));
    };
    $('.more').on('click', function () {
        createEles();
        $('.reduce').css('display', 'inline-block');
        if ($('.adds').prev().index() >= 1) {
            $('.nums').css('display', 'inline-block');
        }
    });
    $('.reduce').on('click', function () {
        var adds = $('.adds');
        $('.Btns').prev().remove();
        if ($('.adds').prev().index() == 1) {
            $('.reduce').css('display', 'none');
            $('.nums').css('display', 'none');
        }

    });
    var warn = $(".weui-toptips_warn");
    if (warn.css("display") == 'block') {
        warn.fadeOut(3000);
    }
</script>
</html>