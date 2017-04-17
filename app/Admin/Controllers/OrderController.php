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
    public function index($tid,$tlid)
    {
        return Admin::content(function (Content $content) use ($tlid) {

            $content->header('订单管理');
            $content->description('订单列表');

            $content->body($this->grid($tlid));
        });
    }

    protected function grid($tlid)
    {
        return Admin::grid(Order::class, function (Grid $grid) use ($tlid) {

            $grid->model()->where('triplist_id','=',$tlid);
            $grid->column('trip','活动名称')->display(function () {
                return $this->trip_name."(". $this->triplist_name .")";
            });
            $grid->user_name('下单人');
            $grid->created_at('下单时间');
            $grid->child_info('订单详细信息')->display(function () {
                $child_arr = unserialize($this->child_info);
                $html = '';
                if ($child_arr) {
                    foreach (unserialize($this->child_info) as $key => $child) {
                        $html .= "  <p><span>小朋友：</span> " . $child['name'] ."</p>                    
                                <p><span>身份证:</span>". $child['card']."</p>
                            <br/>";
                    }
                }
                return $html;
            });;
            $grid->is_payed('是否付款')->display(function ($is_payed) {
                return $is_payed ? '是': '否';
            });
            $grid->total('应付/实付')->display(function () {

                return $this->need_total . '/' . $this->total . ($this->is_bed ? '(占床)': '');
            });;
            $grid->enjoin('特殊嘱咐');

            $grid->disableExport();
            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
                $filter->like('user_name', '下单人');
            });
            $grid->disableCreation();
        });
    }
}