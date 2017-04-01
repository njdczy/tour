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
                        <div class="panel-heading">素材管理
                            <a href="/mobile/index.php?r=wechat/admin/article_edit_news" class="btn btn-primary pull-right">多图文添加</a>
                            <a href="/mobile/index.php?r=wechat/admin/article_edit" class="btn btn-primary pull-right">图文添加</a>
                        </div>
                        @include('wechat.sc.news.tab_header')

                        <div class="container-fluid panel-body">
                            @include('wechat.sc.news.thumbnail')
                        </div>
                    </div>
                    {{ $paginator->render(('wechat.pagination')) }}
                </div>
            </div>
    </section>
@endsection