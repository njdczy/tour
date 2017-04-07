<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

use Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;

use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Widgets\Tab;

use Illuminate\Pagination\LengthAwarePaginator;
class Newscontroller extends WechatController
{
    public function __construct()
    {
        parent::__construct();
    }
    //
    public function index()
    {
        // 永久素材
        $material = $this->wechat->material;
        //图文消息
        $tuwenliebiao = $material->lists('news');
//        //图片
//        $picture = $material->lists('image', 0, 10);
//        //图片
//        $voice = $material->lists('voice', 0, 10);
//        //图片
//        $video = $material->lists('video', 0, 10);

        $paginator  = new LengthAwarePaginator(
            $tuwenliebiao->item,$tuwenliebiao->total_count,$tuwenliebiao->item_count);

        return view('wechat.sc.news.index',compact('paginator'));
    }

}
