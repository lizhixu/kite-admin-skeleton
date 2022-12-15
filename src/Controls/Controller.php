<?php


namespace iLzx\AdminStarter\Controls;

use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use iLzx\AdminStarter\Facades\JWT\JWT;
use iLzx\AdminStarter\Models\ApiResource;
use iLzx\AdminStarter\Models\Role;
use iLzx\AdminStarter\Traits\ReponseTrait;
use iLzx\AdminStarter\Exceptions\AvueTokenExceptions;

class Controller extends \Illuminate\Routing\Controller
{
    use ReponseTrait;

    /**
     * 无需登录的方法,同时也就不需要鉴权了
     * @var array
     */
    protected $noNeedLogin = [];

    /**
     * 无需鉴权的方法,但需要登录
     * 自定义：例 'api/pdd_purchase/account'
     * @var array
     */
    protected $noNeedRight = [];

    /**
     * 传入的token
     * @var string
     */
    protected $token = '';

    public function __construct()
    {
        $path = Request::route()->uri();
        if (in_array($path, $this->noNeedLogin)) {
            return;
        }
        //验证token是否
        $token = Request::header()['authorization'] ?? [];
        if (!$token) {
            if (env('AUTH_ON') == 0) return;
            throw new AvueTokenExceptions('', 203);
        } else {
            try {
                $res = JWT::validationToken($token[0]);
                $role = json_decode($res->role, true);
                $role_id = end($role);
                //超级管理员无需鉴权
                if ($role_id != 1) {
                    //验证接口权限
                    $api_model = new ApiResource();
                    $apis = $api_model->getList([[DB::raw('trim(leading "/" from api_url)'), $path]], '*');
                    $method = Request::method();
                    $menu_id = '';
                    foreach ($apis as $api) {
                        $api_method = str_replace(['0', '1', '2', '3', '4'], ['GET', 'POST', 'PUT', 'DELETE', 'RESOURCE'], $api['api_method']);
                        if ($api_method != $method) {
                            continue;
                        }
                        $menu_id = $api['menu_id'];
                    }
                    if (!$menu_id && !in_array($path, $this->noNeedRight)) {
                        throw new AvueTokenExceptions('', 205);
                    }
                    if (!in_array($path, $this->noNeedRight)) {
                        $role_list = (new Role())->getSingle([['id', $role_id]], 'menu_ids');
                        $menu_ids = explode(',', str_replace(['[', ']'], [''], $role_list->menu_ids));
                        if (!in_array($menu_id, $menu_ids)) {
                            throw new AvueTokenExceptions('', 205);
                        }
                    }
                }
            } catch (ExpiredException $exception) {
                throw new AvueTokenExceptions($exception->getMessage(), 203);
            }
            config(['userInfo' => $res]);
        }
    }
}