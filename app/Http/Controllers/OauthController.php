<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;

class OauthController extends Controller
{
    protected $oauth;


    public function index(Request $request)
    {
        if ($request->has('code') && $request->get('code')) {

            $this->oauth = app('wechat');
            // 获取 OAuth 授权结果用户信息
            $wechat_user = $this->oauth->oauth->user()->toArray();
            session(['wechat_user' => $wechat_user]);

            $user = User::where('openid', $wechat_user['original']['openid'])->first();

            if ($user) {
                $user->last_actived_at = Carbon::now()->toDateTimeString();
                $user->save();
                session(['user_id' => $user->id]);
            } else {
                $this->doRegister();
            }
            $back_url = urldecode($request->get('back_url'));
            $back_url = empty($back_url) ? route('mobile') : $back_url;
            return redirect($back_url);
        }
    }

    private function doRegister()
    {
        $wechat_userinfo = session('wechat_user')['original'];
        $user = new User;
        $user->name = $wechat_userinfo['nickname'];
        $user->wx_nickname = $wechat_userinfo['nickname'];
        $user->password = rand(000000,999999);
        $user->register_source = 'wechat';
        $user->last_actived_at = Carbon::now()->toDateTimeString();
        $user->openid = $wechat_userinfo['openid'];
        $user->avatar = $wechat_userinfo['headimgurl'];
        $user->sex = $wechat_userinfo['sex'];
        $user->city = $wechat_userinfo['city'];
        $user->country = $wechat_userinfo['country'];
        $user->province = $wechat_userinfo['province'];
        $user->save();
        session(['user_id' => $user->id]);
    }
}
