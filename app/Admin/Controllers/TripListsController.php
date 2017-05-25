<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\Controller;

use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;

use Encore\Admin\Controllers\ModelForm;

use App\TripList;
use App\Trip;

class TripListsController extends Controller
{
    use ModelForm;

    public function index($tid)
    {
        return Admin::content(function (Content $content) use ($tid)  {

            $content->header('期数管理');
            $content->description('期数列表：tips 没有对应的价格填 0 即可');

            $content->body($this->grid($tid));

        });
    }

    protected function grid($tid)
    {
        return Admin::grid(TripList::class, function (Grid $grid) use ($tid) {
            $grid->model()->where('trip_id','=',$tid);
            $grid->times('期数');
            $grid->parcent_price('成人价格')->display(function($parcent_price){
                return $parcent_price == 0 ? '该活动没有此类型价格':$parcent_price;
            });
            $grid->child_price('儿童价格')->display(function($child_price){
                return $child_price == 0 ? '该活动没有此类型价格':$child_price;
            });;
            $grid->child_price_bed('儿童占床价格')->display(function($child_price_bed){
                return $child_price_bed == 0 ? '该活动没有此类型价格':$child_price_bed;
            });;


            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
            });

        });
    }

    protected function form($tid)
    {
        return Admin::form(TripList::class, function (Form $form) use ($tid) {
            $form->hidden('trip_id')->value($tid);
            $form->text('times', '期数名称');
            $form->number('parcent_price', '成人价格')->default(0.00);
            $form->number('child_price', '儿童价格')->default(0.00);
            $form->number('child_price_bed', '儿童占床价格')->default(0.00);
//            $form->text('title1', '标题1');
//            $form->text('content1', '文字1');
//            $form->text('title2', '标题2');
//            $form->text('content2', '文字2');
//            $form->text('title3', '标题3');
//            $form->text('content3', '文字3');
            $form->dateTimeRange('date_start', 'date_end', '时间范围');
            // 多图
            //$form->multipleImage('pictures','相册');


        });
    }

    public function edit($tid,$id)
    {
        return Admin::content(function (Content $content) use ($tid,$id) {
            $tripname = Trip::find($tid);

            $content->header($tripname->name);
            $content->description('修改');

            $content->body($this->form($tid)->edit($id));
        });
    }

    public function create($tid)
    {
        return Admin::content(function (Content $content) use ($tid) {
            $tripname = Trip::findOrFail($tid);
            $content->header($tripname->name);
            $content->description('新增期数：tips 没有对应的价格填 0 即可');

            $content->body($this->form($tid));
        });
    }

    public function update($tid,$id)
    {
        return $this->form($tid)->update($id);
    }


    public function store($tid)
    {
        return $this->form($tid)->store();
    }

    public function destroy($tid,$id)
    {
        if ($this->form($tid)->destroy($id)) {
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
