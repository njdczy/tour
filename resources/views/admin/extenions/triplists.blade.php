<a data-toggle="modal" data-target="#triplists-modal" class="btn btn-xs btn-success fa fa-check grid-check-row" data-id="{$this->id}"></a>


<div class="modal fade" id="triplists-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin::lang.filter') }}</h4>
            </div>
            <form action="" method="get" pjax-container>
                <div class="modal-body">
                    <div class="form">
                        {{--@foreach($filters as $filter)--}}
                            {{--<div class="form-group">--}}
                                {{--{!! $filter->render() !!}--}}
                            {{--</div>--}}
                        {{--@endforeach--}}
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary submit">{{ trans('admin::lang.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>