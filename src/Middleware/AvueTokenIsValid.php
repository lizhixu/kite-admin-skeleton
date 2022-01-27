<?php

namespace iLzx\AdminStarter\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use iLzx\AdminStarter\Facades\JWT\JWT;

class AvueTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //验证token是否
        $token = $request->header()['authorization'];
        if (!$token) {
            return adminOutput(203);
        } else {
            $res = JWT::validationToken($token[0]);
            if (!$res) {
                return adminOutput(203);
            }
            config(['userInfo' => $res]);
        }
        return $next($request);
    }
}
