<?php
namespace app\Admin\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use Encore\Admin\Controllers\ModelForm;

use App\Http\Controllers\Controller;

use App\Order;

class OrderController extends Controller
{
    public function index($tid)
    {
        return Admin::content(function (Content $content) use ($tid) {

            $content->header('订单管理');
            $content->description('订单列表');

            $content->body($this->grid($tid));
        });
    }

    protected function grid($tid)
    {
        return Admin::grid(Order::class, function (Grid $grid) use ($tid) {
            $grid->model()->where('trip_id','=',$tid);
            $grid->column('trip','活动名称')->display(function () {
                return $this->trip_name."(". $this->triplist_name .")";
            });
            $grid->user_name('下单人');
            $grid->created_at('下单时间');
            $grid->details('订单详细信息');
            $grid->is_payed('是否付款')->display(function ($is_payed) {
                return $is_payed ? '是': '否';
            });
            $grid->total('付款金额');


            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
                $filter->like('user_name', '下单人');
            });
            $grid->disableCreation();
        });
    }
}