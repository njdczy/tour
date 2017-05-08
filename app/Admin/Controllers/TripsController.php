<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use App\Admin\Extensions\TripLists;
use Encore\Admin\Controllers\ModelForm;

use App\Trip;

use QrCode;
class TripsController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('活动管理');
            $content->description('活动列表');

            $content->body($this->grid());

        });
    }

    protected function grid()
    {
        return Admin::grid(Trip::class, function (Grid $grid) {
            $grid->name('活动名称');
            $grid->column('qrcode','报名二维码')->display(function () {
                return  '<img src="data:image/png;base64,' .base64_encode(QrCode::format("png")->size(100)->generate(url("/form/".$this->id))) .'"/>';
            });
            $grid->price('活动单价')->editable();
            $grid->price_bed('床位单价')->editable();
            //表格扩展
            $grid->actions(function ($actions) {

                $actions->prepend(new TripLists($actions->getKey()));

                $actions->prepend('<a href='.url("admin/triplists/".$actions->getKey()."/create").'><i class="fa fa-plus"></i></a>');
            });

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
            });

        });
    }


    protected function form()
    {
        return Admin::form(Trip::class, function (Form $form) {

            $form->text('name', '活动名称');
            $form->text('price', '活动单价');
            $form->text('price_bed', '床位单价');
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('活动管理');
            $content->description('修改活动');

            $content->body($this->form()->edit($id));
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('活动管理');
            $content->description('新增活动');

            $content->body($this->form());
        });
    }
}
