<?php

namespace iLzx\AdminStarter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'kite_role';
    protected $fillable = ['role_name', 'parent_id', 'sort', 'menu_ids'];

    public function getList($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get();
    }

    public function getSingle($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->first();
    }

    /**
     * 获取管理员按钮权限.
     *
     * @return void
     */
    public function getButtenRole($id)
    {
        $conditions = [];
        $menu = new Menu();
        //超级管理员返回所有
        if ($id == 1) {
            $conditions[] = ['type', '3'];
        } else {
            $role = $this->getSingle([['id', $id]], 'menu_ids');
            $menu_ids = explode(',', str_replace(['[', ']'], [''], $role->menu_ids));
            $conditions[] = [function ($query) use ($menu_ids) {
                $query->whereIn('id', $menu_ids);
            }];
        }

        return $menu->getMenu($conditions, 'name')->pluck('name')->toArray();
    }
}
