@if (isset($children) && $children)
    @foreach($children as $key => $child)
<<<<<<< HEAD
        <h3 class="Info">小朋友信息<span class="nums">(<span>1</span>)</span></h3>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">小朋友姓名 <span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text"  placeholder="小朋友姓名" value="" name="inputChild[]">
=======
        <h3 class="Info">小朋友信息<span class="nums">(1)</span></h3>
        <div class="weui-cells__title">小朋友姓名 <span> *</span></div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="小朋友姓名" name="inputChild[]">
                </div>
>>>>>>> 075a773af3e18004567b26c6b84cdeeda6e78c01
            </div>
        </div>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">证件号码 <span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="证件号码" value="" name="inputID[]">
            </div>
        </div>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">身高 <span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="身高" value="" name="inputHeight[]">
            </div>
        </div>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">体重（kg） <span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="体重（kg）" value="" name="inputWeight[]">
            </div>
        </div>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">所在学校 <span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool[]">
            </div>
        </div>
<<<<<<< HEAD
        <div class="weui-cell cells"></div>
        <input type="hidden" value="{{$child->id}}" name="child_id[]">
    @endforeach
@else
    <h3 class="Info">小朋友信息<span class="nums">(<span>1</span>)</span></h3>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">小朋友姓名 <span> *</span></label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text"  placeholder="小朋友姓名" value="" name="inputChild[]">
=======
    @endforeach
@else
    <h3 class="Info">小朋友信息<span class="nums">(1)</span></h3>
    <div class="weui-cells__title">小朋友姓名 <span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="小朋友姓名" value="" name="inputChild[]">
            </div>
>>>>>>> 075a773af3e18004567b26c6b84cdeeda6e78c01
        </div>
    </div>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">证件号码 <span> *</span></label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="证件号码" value="" name="inputID[]">
        </div>
    </div>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">身高 <span> *</span></label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="身高" value="" name="inputHeight[]">
        </div>
    </div>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">体重（kg） <span> *</span></label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="体重（kg）" value="" name="inputWeight[]">
        </div>
    </div>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">所在学校 <span> *</span></label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool[]">
        </div>
    </div>
    <div class="weui-cell cells"></div>
@endif