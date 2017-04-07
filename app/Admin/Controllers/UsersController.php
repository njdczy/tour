<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

use Encore\Admin\Controllers\ModelForm;

use App\Http\Controllers\Controller;
use App\User;
use App\Child;
use App\Order;

class UsersController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('用户管理');
            $content->description('用户列表');

            $content->body($this->grid());
        });
    }

    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {
            //微信原始信息
            $grid->avatar('头像')->display(function ($avatar) {

                return $avatar ? $avatar : config('admin.avatar_default');

            })->image('', 80, 80);

            $grid->column('wx_mix', '微信基本信息')->display(function () {

                $sex = $this->sex == 1 ? '男' : '女';

                return "<p>$this->wx_nickname (" . $sex . ")</p>
                           <p><span>关注时间:</span>$this->created_at</p>                          
                           <p style='max-width: 40px'><span>备注:$this->remark</span></p>";
            });
            //后期信息
            $grid->column('wx_id', '微信ID')->editable();
            //小孩信息


            $grid->column('child_base', '小朋友基本信息')->display(function () {
                $child = Child::where('user_id', '=', $this->id)->first();

                $sex =  check::getSex($child->card) == 1 ? '男' : '女';

                $age=  date('Y',time())-substr(check::getDate($child->card),0,4);

                return "<p> ".$child->name."（".$sex." ，" .$age . "岁）</p>
                            <p>$child->height m/$child->weight kg</p>
                            ";
            });
            $grid->column('child_details', '小朋友详细信息')->display(function () {
                $child = Child::where('user_id', '=', $this->id)->first();

                return "<p><span>身份证:</span>$child->card</p>
                           <p><span>学校:</span>$child->school</p>
                          ";
            });
            $grid->column('more', '家长信息')->display(function () {
                return "<p><span>$this->real_name:</span>$this->phone_number</p>                    
                            <p><span>联系邮箱:</span>$this->email</p>                                                 
                            <p><span>住址:</span>$this->address</p>                          
                            ";
            });
            $grid->column('last_trip', '最近一次活动')->display(function () {

                $latest_order = Order::where('user_id','=',$this->id)->latest()
                    ->first();
                return "                                               
                            <p>$latest_order->trip_name</p>                          
                            ";
            });

            //表格显示控制
            $grid->disableCreation();
            $grid->filter(function ($filter) {
                $filter->disableIdFilter();// 禁用id查询框
                $filter->like('name', '名称');
            });
            //表格扩展
            $grid->actions(function ($actions) {

                $actions->prepend('<a href=""><i class="fa fa-eye"></i></a>');

            });
        });
    }

    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->text('real_name', '真实姓名');
            $form->text('phone_number', '手机号');
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('用户列表');
            $content->description('修改');

            $content->body($this->form()->edit($id));
        });
    }

}

class check
{
    public static function getSex($card)
    {
        if (strlen($card) == 15) {
            $sexNum = substr($card, 12, 3);
        } else {
            $sexNum = substr($card, 14, 3);
        }

        return $sexNum % 2 == 0 ? 1 : 2;
    }

    public static function getDate($card)
    {
        if (strlen($card) == 15) {
            $dateNum = substr($card, 6, 6);
        } else {
            $dateNum = substr($card, 6, 8);
        }

        return $dateNum;
    }

    // 验证18位身份证最后一位
    public static function checkEnd($card)
    {
        $checkHou = array(1, 0, 'x', 9, 8, 7, 6, 5, 4, 3, 2);
        $checkGu = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        $sum = 0;
        for ($i = 0; $i < 17; $i++) {
            $sum += (int)$checkGu[$i] * (int)$card [$i];
        }
        $checkHouParameter = $sum % 11;
        if ($checkHou[$checkHouParameter] != $card [17]) {
            return false;
        } else {
            return true;
        }
    }
}



// 新的18位身份证号码各位的含义:
// 1-2位省、自治区、直辖市代码；    11-65
// 3-4位地级市、盟、自治州代码；
// 5-6位县、县级市、区代码；
// 7-14位出生年月日，比如19670401代表1967年4月1日；
// 15-17位为顺序号，其中17位男为单数，女为双数；
// 18位为校验码，0-9和X，由公式随机产生。
// 举例：
// 130503 19670401 0012这个身份证号的含义: 13为河北，05为邢台，03为桥西区，出生日期为1967年4月1日，顺序号为001，2为验证码。


// 15位身份证号码各位的含义:
// 1-2位省、自治区、直辖市代码；
// 3-4位地级市、盟、自治州代码；
// 5-6位县、县级市、区代码；
// 7-12位出生年月日,比如670401代表1967年4月1日,这是和18位号码的第一个区别；
// 13-15位为顺序号，其中15位男为单数，女为双数；
// 与18位身份证号的第二个区别：没有最后一位的验证码。
// 举例：
// 130503 670401 001的含义; 13为河北，05为邢台，03为桥西区，出生日期为1967年4月1日，顺序号为001。


