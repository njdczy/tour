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
    use ModelForm;
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

            $grid->model()->where('triplist_id','=',$tlid)->orderBy('id', 'desc');
            $grid->column('trip','活动名称')->display(function () {
                return $this->trip_name."(". $this->triplist_name .")";
            });
            $grid->user_name('下单人');
            $grid->created_at('下单时间');
            $grid->mobile('手机号码');
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
            });
            $grid->pay_type('付款方式')->display(function ($pay_type) {
                switch ($pay_type){
                    case 1 : return '微信';
                    case 2 : return '线下支付';
                    default : return '';
                }
            });
//            $grid->is_payed('是否付款')->display(function ($is_payed) {
//                return $is_payed ? '是': '否';
//            });
            $grid->is_payed('是否付款')->editable('select', [1 => '是', 0=> '否']);

            $grid->need_total('应付');
            $grid->total('实付')->editable();
            $grid->pay_to_who('收款人')->editable();
            $grid->enjoin('特殊嘱咐');
            $grid->remark('备注')->editable();
            $grid->disableExport();
            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
                $filter->like('user_name', '下单人');
                $filter->is('is_payed', '是否付款')->select(['1'=>'是','0'=>'否']);
            });
            $grid->disableCreation();
        });
    }

    public function edit($tid,$tlid,$id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('订单详情');
            $content->description('操作');
            $content->body($this->form()->edit($id));
        });
    }
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {
            $form->radio('is_payed', '是否付款')->options([1 => '是', 0=> '否'])->default(0);
            //$form->text('is_payed', '是否付款');
            $form->text('total', '实付金额');
            $form->text('pay_to_who', '收款人');
            $form->text('remark', '备注');
        });
    }

    public function store($tid,$tlid,$id)
    {
        return $this->form()->store($id);
    }

    public function update($tid,$tlid,$id)
    {
        return $this->form()->update($id);
    }


}