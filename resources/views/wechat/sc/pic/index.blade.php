@extends('admin::index')

@section('content')
    <section class="content-header">
        <h1>
            {{ $header or trans('admin::lang.title') }}
            <small>{{ $description or trans('admin::lang.description') }}</small>
        </h1>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">图片管理
                   </div>
                    @include('wechat.sc.news.tab_header')

                    <div class="container-fluid panel-body">
                        @include('wechat.sc.pic.pic')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection