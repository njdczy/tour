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
    <ul class="step">
        <li class="step_one on">
            <i></i>
        </li>
        <li class="progress">
            <i></i>
        </li>
        <li class="progress">
            <i></i>
        </li>
    </ul>
    <form method="post" action="/form/{{ $trip->id }}" name="person">

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

            @if($trip->need_bed)
            <div class="weui-cells weui-cells_radio">
                <label class="weui-cell weui-check__label" id="is_bed">
                    <div class="weui-cell__bd">
                        <p>占床</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" checked class="weui-check" name="bed" >
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
                <label class="weui-cell weui-check__label" id="is_not_bed">

                    <div class="weui-cell__bd">
                        <p>不占床</p>
                    </div>
                    <div class="weui-cell__ft">
                        <input type="radio" class="weui-check" name="bed" >
                        <span class="weui-icon-checked"></span>
                    </div>
                </label>
            </div>
            @endif
            <div class="page__bd page__bd_spacing subBtn" style="display: block;">
                <button id="submit" type="submit"  class="weui-btn weui-btn_primary">提交</button>
            </div>
        </div>
        <input type="hidden" value="0" name="is_bed"  >
        {{ csrf_field() }}
    </form>
</div>

</body>

<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
    $('#is_bed').on('click',function(){
        $('input[name=is_bed]').val(1);
    });
    $('#is_not_bed').on('click',function(){
        $('input[name=is_bed]').val(0);
    });
</script>
<script type="text/javascript">
        var next = document.getElementsByClassName('next');
        var box = document.getElementsByClassName('box');
        var progress = document.getElementsByClassName('progress');
        for (var i= 0; i < next.length;i++) {
            next[i].index = i;
            next[i].onclick=function(){
                for (var j = 0;j <next.length;j++ ) {
                    progress[j].className='progress';
                    box[j].className='box';
                }
//                switch (this.index){
//                    case 0:
//                        console.log(this.index);
//                        break;
//                    case 1:
//                        console.log(this.index);
//                        break;
//                }
                if(this.index == 0 || this.index==1){
                    $('.step_one').removeClass('on');
                    $('.time').css('display','none');
                }
                box[this.index].className='box active';
                progress[this.index].className='progress on';
            }
        }
        // 孩子信息功能
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
        // 父母信息功能
        var num = 1
        function createParents(i){
            var parentsHtml = $('.parent-add').html();
            var parents = document.createElement('section');
            parents.className = 'parent-add';
            parents.innerHTML = parentsHtml;
            $(parents).insertBefore($(".parent-btns"));
           
        };
        $('.parent-more').on('click',function(){
            num++;      
            createParents(num);
            $('.parent-reduce').css('display','inline-block');
            if(num >= 1){
                $('.parent-nums').css('display','inline-block');            
                $('.parent-nums span').each(function(i){
                    $('.parent-nums span').eq(i).html(i+1)
                })
            }       
        });
        $('.parent-reduce').on('click',function(){
            num--;
            var pars_adds = $('.parent-add');
            pars_adds.eq(num).remove();
            console.log($('.parent-add').eq(num));
            if(num == 1){
                $('.parent-reduce').css('display','none');
                $('.parent-nums').css('display','none');
            }
            $('.parent-nums span').each(function(i){
                $('.parent-nums span').eq(i).html(i+1)
            })
        });
        var warn = $(".weui-toptips_warn");
        if (warn.css("display") == 'block') {
            warn.fadeOut(3000);
        }
</script>
</html>