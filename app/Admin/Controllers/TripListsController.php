<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\Controller;

use Encore\Admin\Form;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use Encore\Admin\Controllers\ModelForm;

use App\TripList;
use App\Trip;

class TripListsController extends Controller
{
    use ModelForm;

    protected function form($tid)
    {
        return Admin::form(TripList::class, function (Form $form) use ($tid) {
            $form->hidden('trip_id')->value($tid);
            $form->text('times', '期数名称');
            $form->text('title1', '标题1');
            $form->text('content1', '文字1');
            $form->text('title2', '标题2');
            $form->text('content2', '文字2');
            $form->text('title3', '标题3');
            $form->text('content3', '文字3');
            $form->dateTimeRange('date_start', 'date_end', '时间范围');
            // 多图
            $form->multipleImage('pictures','相册');


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
            $content->description('新增期数');

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
