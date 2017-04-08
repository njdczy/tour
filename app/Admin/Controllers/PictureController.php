<?php

namespace App\Admin\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use Encore\Admin\Controllers\ModelForm;

use App\Picture;
use App\Child;

class PictureController extends Controller
{
    use ModelForm;

    public function index($tlid)
    {
        return Admin::content(function (Content $content) use ($tlid) {

            $content->header('相册管理');
            $content->description('相册详情');

            $content->body($this->grid($tlid));
        });
    }

    protected function grid($tlid)
    {
        return Admin::grid(Picture::class, function (Grid $grid) use ($tlid) {
            $grid->model()->where('triplist_id','=',$tlid);
            $grid->column('child_name','小盆友')->display(function (){
                $child = Child::where('user_id', '=', $this->user_id)->first();
                return $child->name;
            });


            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
            });
        });
    }

    protected function form($tlid)
    {
        return Admin::form(Picture::class, function (Form $form) use ($tlid) {
            $form->hidden('triplist_id')->value($tlid);
            // 多图
            $children_arr = Child::all()->pluck('name', 'user_id')->toArray();
            $form->select('user_id', '选择小朋友')->options($children_arr);
            $form->multipleImage('pictures','相册1');
            $form->multipleImage('pictures2','相册2');
            $form->multipleImage('pictures3','相册3');


        });
    }

    public function edit($tlid,$id)
    {
        return Admin::content(function (Content $content) use ($tlid,$id) {

            $content->header('相册管理');
            $content->description('相册期数');

            $content->body($this->form($tlid)->edit($id));
        });
    }

    public function create($tlid)
    {
        return Admin::content(function (Content $content) use ($tlid){

            $content->header('相册管理');
            $content->description('新增相册');

            $content->body($this->form($tlid));
        });
    }

    public function update($tlid,$id)
    {
        return $this->form($tlid)->update($id);
    }


    public function store($tlid)
    {
        return $this->form($tlid)->store();
    }

    public function destroy($tlid,$id)
    {
        if ($this->form($tlid)->destroy($id)) {
            return response()->json([
                'status'  => true,
                'message' => trans('admin::lang.delete_succeeded'),
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => trans('admin::lang.delete_failed'),
            ]);
        }
    }
}
