<div class="box">
    <h3 class="Info patriarch">家长信息</h3>
    <section>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">家长姓名<span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text"  placeholder="家长姓名"
                       value="{{ old('inputParent') }}" name="inputParent">
            </div>
        </div>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">家长手机<span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="家长手机"
                       value="{{ old('inputTel') }}" name="inputTel">
            </div>
        </div>
    </section>
    <div class="weui-cell cells"></div>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">特殊嘱咐</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="特殊嘱咐" value="{{ old('inputEnjoin') }}" name="inputEnjoin">
        </div>
    </div>
    <div class="page__bd page__bd_spacing next next_two">
        <a href="javascript:;" class="weui-btn weui-btn_primary">下一步</a>
    </div>
</div>