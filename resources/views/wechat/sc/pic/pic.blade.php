    <div class="">
        <p>全部图片</p>
        <form class="pull_right" action="/mobile/index.php?r=wechat/admin/picture" method="post" enctype="multipart/form-data" id="picForm">
            <div class="form-group">
                <a href="javascript:;" class="btn btn-success">上传图片</a><span class="text-muted"> 大小: 不超过2M, 格式: jpg</span>
                <input type="file" name="pic" style="display: none;" onChange="$('#picForm').submit();" />
            </div>
        </form>
    </div>
    <div class="row" style="margin:0;">
        <div class="col-xs-4 col-md-2 col-lg-2 thumbnail" style="margin-right:10px;">
            <img alt="egg_1.png" src="plugins/wechat/zjd/view/images/egg_1.png" class="img-rounded" style="height:220px" />
            <p class="text-muted" style="word-wrap:break-word;word-break:normal;">egg_1.png</p>
            <p class="text-muted">36KB</p>
            <div class="bg-info">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li role="presentation"><a href="/mobile/index.php?r=wechat/admin/download&id=2" title="下载" class="ectouch-fs18"><span class="glyphicon glyphicon-download-alt"></span></a></li>
                    <li role="presentation"><a href="/mobile/index.php?r=wechat/admin/media_edit&id=2" title="编辑" class="ectouch-fs18 fancybox fancybox.iframe"><span class="glyphicon glyphicon-pencil"></span></a></li>
                    <li role="presentation"><a href="javascript:if(confirm('确定删除吗？')){window.location.href='/mobile/index.php?r=wechat/admin/media_del&id=2'};" title="删除" class="ectouch-fs18"><span class="glyphicon glyphicon-trash"></span></a></li>
                </ul>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 col-lg-2 thumbnail" style="margin-right:10px;">
            <img alt="egg_1.png" src="plugins/wechat/zjd/view/images/egg_1.png" class="img-rounded" style="height:220px" />
            <p class="text-muted" style="word-wrap:break-word;word-break:normal;">egg_1.png</p>
            <p class="text-muted">36KB</p>
            <div class="bg-info">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li role="presentation"><a href="/mobile/index.php?r=wechat/admin/download&id=1" title="下载" class="ectouch-fs18"><span class="glyphicon glyphicon-download-alt"></span></a></li>
                    <li role="presentation"><a href="/mobile/index.php?r=wechat/admin/media_edit&id=1" title="编辑" class="ectouch-fs18 fancybox fancybox.iframe"><span class="glyphicon glyphicon-pencil"></span></a></li>
                    <li role="presentation"><a href="javascript:if(confirm('确定删除吗？')){window.location.href='/mobile/index.php?r=wechat/admin/media_del&id=1'};" title="删除" class="ectouch-fs18"><span class="glyphicon glyphicon-trash"></span></a></li>
                </ul>
            </div>
        </div>
    </div>

