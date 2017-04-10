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
            //表格扩展
            $grid->actions(function ($actions) {

                $actions->prepend(new TripLists($actions->getKey()));

                //$actions->prepend('<a href='.url("admin/triplists/".$actions->getKey()).'><i class="fa fa-eye"></i></a>');
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
