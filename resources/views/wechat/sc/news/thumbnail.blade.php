<div class="row">
    @foreach ($paginator->items() as $item)
    <div class="col-sm-6 col-md-4 col-lg-2">
        <div class="article">
            <h4>{{ $item['content']['news_item'][0]['title'] }}</h4>
            <p>{{ $item['update_time'] }}</p>
            <div class="cover"><img src="{{ $item['content']['news_item'][0]['thumb_url'] }}" /></div>
            <p>{{ $item['content']['news_item'][0]['digest'] }}</p>

        </div>
        <div class="bg-info">
            <ul class="nav nav-pills nav-justified" role="tablist">
                <li role="presentation"><a href="/mobile/index.php?r=wechat/admin/article_edit&id=2" title="编辑" class="ectouch-fs18"><span class="glyphicon glyphicon-pencil"></span></a></li>
                <li role="presentation"><a href="javascript:if(confirm('确定删除吗？')){window.location.href='/mobile/index.php?r=wechat/admin/article_del&id=2'};" title="删除" class="ectouch-fs18"><span class="glyphicon glyphicon-trash"></span></a></li>
            </ul>
        </div>
    </div>
    @endforeach
</div>