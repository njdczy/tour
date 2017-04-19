<div class="parent_box" style="display: none;">
    <h3 class="Info patriarch">家长信息</h3>
    <div class="weui-cells__title">家长姓名<span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="家长姓名"
                       value="{{ old('inputParent') }}" name="inputParent">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">家长手机<span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="家长手机" value="{{ old('inputTel') }}" name="inputTel">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">家庭住址<span> *</span></div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input inputParent" type="text" placeholder="家庭住址" value="{{ old('inputAddress') }}" name="inputAddress">
            </div>
        </div>
    </div>
    <div class="weui-cells__title">联系邮箱</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="联系邮箱" value="" name="inputEmail">
            </div>
        </div>
    </div>
    {{--<div class="weui-cells__title">微信ID（开营前5天建立微信群）</div>--}}
    {{--<div class="weui-cells">--}}
    {{--<div class="weui-cell">--}}
    {{--<div class="weui-cell__bd">--}}
    {{--<input class="weui-input" type="text" placeholder="微信ID" value="" name="inputWechat">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="weui-cells__title">家长特殊嘱咐</div>
    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="家长特殊嘱咐" value="" name="inputEnjoin">
            </div>
        </div>
    </div>
    <div class="page__bd page__bd_spacing next_clild">
         <a href="javascript:;" class="weui-btn weui-btn_primary">下一步</a>
    </div>
</div>