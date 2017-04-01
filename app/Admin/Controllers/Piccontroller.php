<?php

namespace App\Admin\Controllers;



class Piccontroller extends Wechatcontroller
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

        //图片
        $picture = $material->lists('image', 0, 10);
//        //图片
//        $voice = $material->lists('voice', 0, 10);
//        //图片
//        $video = $material->lists('video', 0, 10);

//        $paginator  = new LengthAwarePaginator(
//            $picture->item,$picture->total_count,$picture->item_count);

        //return view('wechat.sc.pic.index',compact('paginator'));
        return view('wechat.sc.pic.index');
    }
}
