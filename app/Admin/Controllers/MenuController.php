<?php


namespace app\Admin\Controllers;

use App\Admin\Controllers\WechatController;

class MenuController extends WechatController
{
    protected $menu;

    public function __construct()
    {
        parent::__construct();
        $this->menu = $this->wechat->menu;
    }

    public function index()
    {
        dd($this->menu->current());
        $this->menu->all();
    }
}