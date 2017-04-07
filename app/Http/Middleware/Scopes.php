<?php

namespace App\Http\Middleware;

use Closure;

class Scopes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (strripos($request->server('HTTP_USER_AGENT'), 'micromessenger'))
        {
            if (empty(session('wechat_user'))) {
                $callback = "http://".$request->server('HTTP_HOST').$request->server('REQUEST_URI');

                $wechat = app('wechat');

                $response = $wechat->oauth->scopes(['snsapi_userinfo'])
                    ->redirect(route('oauth',['back_url' => $callback]));
                return $response;
            }
        }
        return $next($request);
    }
}
