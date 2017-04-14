@if (isset($children) && $children)
    @foreach($children as $key => $child)
        <h3 class="Info">小朋友信息<span class="nums">(<span>1</span>)</span></h3>
        <div class="weui-cells__title">小朋友姓名 <span> *</span></div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="小朋友姓名" name="inputChild[]">
                </div>
            </div>
        </div>
        <div class="weui-cells__title">证件号码 <span> *</span></div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="证件号码" value="" name="inputID[]">
                </div>
            </div>
        </div>
        <div class="weui-cells__title">身高（cm）<span> *</span></div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="身高" value="" name="inputHeight[]">
                </div>
            </div>
        </div>
        <div class="weui-cells__title">体重（kg）<span> *</span></div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="体重" value="" name="inputWeight[]">
                </div>
            </div>
        </div>
        <div class="weui-cells__title">所在学校<span> *</span></div>
        <div class="weui-cells">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool[]">
                </div>
            </div>
        </div>
        <input type="hidden" value="{{$child->id}}" name="child_id[]">
    @endforeach
@else
    <h3 class="Info">小朋友信息<span class="nums">(<span>1</span>)</span></h3>
    <div class="weui-cells__title">小朋友姓名 <span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="小朋友姓名" value="" name="inputChild[]">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">证件号码 <span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="证件号码" value="" name="inputID[]">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">身高（cm）<span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="身高" value="" name="inputHeight[]">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">体重（kg）<span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="体重" value="" name="inputWeight[]">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">所在学校<span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="所在学校" value="" name="inputSchool[]">
            </div>
        </div>
    </div>
@endif