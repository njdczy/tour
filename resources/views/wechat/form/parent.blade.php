<div class="box">
    <section class="parent-add">
        <h3 class="Info patriarch">家长信息<span class="parent-nums">(<span>1</span>)</span></h3>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">家长姓名<span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text"  placeholder="家长姓名"
                       name="inputParent[]">
            </div>
        </div>
        <div class="weui-cell cells">
            <div class="weui-cell__hd">
                <label class="weui-label">家长手机<span> *</span></label>
            </div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" placeholder="家长手机"
                        name="inputTel[]">
            </div>
        </div>
        <div class="weui-cell cells"></div>
    </section>
    <div class="parent-btns">
        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary parent-more">+</a>
        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary parent-reduce">-</a>
    </div>
    <div class="weui-cell cells">
        <div class="weui-cell__hd">
            <label class="weui-label">特殊嘱咐</label>
        </div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" placeholder="特殊嘱咐" value="{{ old('inputEnjoin') }}" name="inputEnjoin">
        </div>
    </div>
    <div class="weui-cell cells"></div>
    <div class="page__bd page__bd_spacing next next_two">
        <a href="javascript:;" class="weui-btn weui-btn_primary">下一步</a>
    </div>
</div>