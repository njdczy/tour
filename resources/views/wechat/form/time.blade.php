<div class="time">
    <h3 class="Info">时间选择</h3>
    <div class="weui-cells__title">入营时间（按照实际情况选择）<span> *</span></div>
    <div class="weui-cells weui-cells_checkbox">
        @foreach($trip_lists as $key => $trip_list)
            <label class="weui-cell weui-check__label" for="Date{{ $trip_list->id }}">
                <div class="weui-cell__hd">
                    <input type="radio" class="weui-check" name="Date"
                           @if($key == 0) checked @endif value="{{ $trip_list->id }}" id="Date{{ $trip_list->id }}">
                    <i class="weui-icon-checked"></i>
                </div>
                <div class="weui-cell__bd">
                    <p>{{ $trip_list->times }}：
                        {{ $trip_list->date_start->month }}月{{ $trip_list->date_start->day }}日-
                        {{ $trip_list->date_end->month }}月{{ $trip_list->date_end->day }}日
                    </p>
                </div>
            </label>
        @endforeach
    </div>
    <input type="hidden" value="" name="triplist_id"  >
    <div class="page__bd page__bd_spacing next next_one">
         <a href="javascript:;" class="weui-btn weui-btn_primary">下一步</a>
    </div>
    <script>
        $('input[name=Date]').on('click',function(){
            $('input[name=triplist_id]').val($(this).val());
        });
    </script>
</div>