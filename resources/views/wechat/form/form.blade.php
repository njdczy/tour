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
<<<<<<< HEAD
    <ul class="step">
        <li class="step_one on">
            <i></i>
        </li>
        <li class="step_two">
            <i></i>
        </li>
        <li class="step_three">
            <i></i>
        </li>
    </ul>
    <form method="post" action="/form/{{ $trip->id }}" name="person">
=======

    <form method="post" action="/form" name="person">
        <div class="adds">
            @include('wechat.form.child')
        </div>
        <div class="Btns">
            <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary more">+</a>
            <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary reduce">-</a>
        </div>

        @include('wechat.form.parent')
        <div class="weui-cells__title">家长特殊嘱咐</div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="家长特殊嘱咐" value="" name="inputEnjoin">
                </div>
            </div>
        </div>
        <div class="weui-cells__title">床位<span> *</span></div>
        <div class="weui-cells weui-cells_checkbox">
            <label class="weui-cell weui-check__label" for="is_bed1">
                <div class="weui-cell__hd">
                    <input type="radio" checked class="weui-check" name="is_bed"
                           value="1" id="is_bed1">
                    <i class="weui-icon-checked"></i>
                </div>
                <div class="weui-cell__bd">
                    <p>是</p>
                </div>
            </label>
            <label class="weui-cell weui-check__label" for="is_bed0">
                <div class="weui-cell__hd">
                    <input type="radio" class="weui-check" name="is_bed"
                           value="0" id="is_bed0">
                    <i class="weui-icon-checked"></i>
                </div>
                <div class="weui-cell__bd">
                    <p>否</p>
                </div>
            </label>
        </div>

>>>>>>> 075a773af3e18004567b26c6b84cdeeda6e78c01
        @include('wechat.form.time')
        @include('wechat.form.parent')
        <div class="box">
            <div class="adds">
                @include('wechat.form.child')
            </div>
            <div class="Btns">
                <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary more">+</a>
                <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary reduce">-</a>
            </div>
            <div class="page__bd page__bd_spacing subBtn" style="display: block;">
                <button type="submit" class="weui-btn weui-btn_primary">提交</button>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
</div>

</body>

<<<<<<< HEAD
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript">
        var next = document.getElementsByClassName('next');
        var box = document.getElementsByClassName('box');
        for (var i= 0; i < next.length;i++) {
            next[i].index = i;
            next[i].onclick=function(){
                for (var j = 0;j <next.length;j++ ) {
                    box[j].className='box';
                }
                box[this.index].className='box active';
            }
        }
        $('.next_one').on('click',function(){
            $('.time').css('display','none');
            $('.step_one').removeClass('on');
            $('.step_two').addClass('on');
        })
        $('.next_two').on('click',function(){
            $('.step_one').removeClass('on');
            $('.step_two').removeClass('on');
            $('.step_three').addClass('on');
        })
        var _index = 1;
        function createEles(i){
            var html = $('.adds').html();
            var Adds = document.createElement('div');
            Adds.className = 'adds';
            Adds.innerHTML = html;
            $(Adds).insertBefore($(".Btns"));
        };
        $('.more').on('click',function(){
            _index++;
            createEles(_index);
            $('.reduce').css('display','inline-block');
            if(_index > 1){
                $('.nums').css('display','inline-block');
                $('.nums span').each(function(i){
                    $('.nums span').eq(i).html(i+1)
                })
            }
        });
        $('.reduce').on('click',function(){
            _index--;
            var adds = $('.adds');
            $('.adds').eq(_index).remove();
            if(_index == 1){
                $('.reduce').css('display','none');
                $('.nums').css('display','none');
            }
            $('.nums span').each(function(i){
                $('.nums span').eq(i).html(i+1)
            })
        });
=======

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
>>>>>>> 075a773af3e18004567b26c6b84cdeeda6e78c01
    var warn = $(".weui-toptips_warn");
    if (warn.css("display") == 'block') {
        warn.fadeOut(3000);
    }
</script>
</html>