<?php
use Illuminate\Database\Seeder;

use App\User;
use App\Child;
use App\Trip;
use App\TripList;
use App\Order;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::insertGetId([
            'name'            => '卞铮',
            'real_name'       => '卞铮',
            'phone_number'    => '18551868888',
            'wx_nickname'     => '卞铮',
            'password'        => '123456',
            'register_source' => 'wechat',
            'last_actived_at' => '2017-04-06 08:41:28',
            'openid'          => 'oDVSv1S-bqF4S1Y3WQAI4HVdcAFE',
            'avatar'          => 'http://wx.qlogo.cn/mmopen/wkQC4hQJ6Hv9N1hXs1JGKNfc24hwlg4CWn26MeUcwTbrI90GtAMxkkEicILIrichJSod5wvD1yF541WP3lJiboCj72v6ExQJGb7/0',
            'sex'             => 1,
            'city'            => '南京',
            'country'         => '中国',
            'province'        => '江苏',
            'address'         => '幸福大街110号',
        ]);

        $child_id = Child::insertGetId([
            'name'    => '狗蛋',
            'height'  => '1.00',
            'weight'  => '30',
            'card'    => '320882199303278888',
            'school'  => '南大附小',
            'user_id' => $user_id,
        ]);

        $trip_id = Trip::insertGetId([
            'name'    => '2017王牌特工精品来袭',
        ]);
        $triplist_id = TripList::insertGetId([
            'times'    => "第一期",
            'trip_id' => $trip_id,
        ]);
        Order::insertGetId([
            'trip_id'    => $trip_id,
            'trip_name'    => "2017王牌特工精品来袭(第一期)",
            'triplist_id' => $triplist_id,
            'user_id' => $user_id,
            'child_id' => $child_id,
        ]);
    }
}
