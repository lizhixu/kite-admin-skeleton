<?php

namespace iLzx\AdminStarter\Database\Seeds;

use Illuminate\Database\Seeder;

class KiteMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kite_menus')->delete();

        \DB::table('kite_menus')->insert(array (
            0 =>
            array (
                'id' => 1,
                'type' => '0',
                'parent_id' => 0,
                'path' => '/home',
                'redirect' => '',
                'name' => 'home',
                'component' => 'home/index',
                'title' => '控制台',
                'icon' => 'iconfont icon-shouye',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '1',
                'created_at' => '2022-04-29 00:31:00',
                'updated_at' => '2022-09-23 13:04:50',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            1 =>
            array (
                'id' => 2,
                'type' => '0',
                'parent_id' => 0,
                'path' => '/setting',
                'redirect' => '/setting/permission',
                'name' => 'setting',
                'component' => '',
                'title' => '系统设置',
                'icon' => 'el-icon-set-up',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-04-29 16:38:25',
                'updated_at' => '2022-10-03 02:53:28',
                'tpl_type' => 1,
                'options' => NULL,
                'options_type' => '0',
            ),
            2 =>
            array (
                'id' => 3,
                'type' => '0',
                'parent_id' => 2,
                'path' => '/setting/permission',
                'redirect' => '/setting/permission/menus',
                'name' => 'auth',
                'component' => '',
                'title' => '权限系统',
                'icon' => 'el-icon-postcard',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-04-28 08:40:35',
                'updated_at' => '2022-04-28 10:37:02',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            3 =>
            array (
                'id' => 4,
                'type' => '0',
                'parent_id' => 3,
                'path' => '/setting/permission/menus',
                'redirect' => '',
                'name' => 'menus',
                'component' => 'setting/permission/menus',
                'title' => '菜单管理',
                'icon' => 'iconfont icon-caidan',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-04-28 08:46:52',
                'updated_at' => '2022-04-28 08:55:11',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            4 =>
            array (
                'id' => 5,
                'type' => '0',
                'parent_id' => 3,
                'path' => '/setting/permission/admin_manage',
                'redirect' => '',
                'name' => 'admin_manage',
                'component' => 'setting/permission/admin_manage',
                'title' => '管理员管理',
                'icon' => 'el-icon-user',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-04-28 18:08:06',
                'updated_at' => '2022-11-15 08:45:34',
                'tpl_type' => 1,
                'options' => '{
"labelPosition": "left",
"labelSuffix": "：",
"labelWidth": 120,
"gutter": 0,
"menuBtn": true,
"submitBtn": true,
"submitText": "提交",
"emptyBtn": true,
"emptyText": "清空",
"menuPosition": "center",
"index": true,
"border": true,
"headerAlign": "center",
"align": "center",
"column": [
{
"label": "头像",
"prop": "avatar",
"type": "upload",
"span": 24,
"multiple": false,
"display": true,
"showFileList": true,
"limit": 1,
"propsHttp": {
"fileName": "pic",
"url": "img_url"
},
"listType": "picture-img",
"required": false,
"action": "//194811.xyz/upload.php",
"data": {
"token": "fe7c4c740098cde801355cacecad3447"
}
},
{
"label": "用户名",
"prop": "name",
"type": "input",
"span": 24,
"filter": false,
"search": true,
"display": true,
"rules": [
{
"required": true,
"message": "用户名必须填写"
}
],
"required": true
},
{
"label": "登录账号",
"prop": "username",
"type": "input",
"span": 24,
"display": true,
"required": true,
"rules": [
{
"required": true,
"message": "登录账号必须填写"
}
]
},
{
"label": "密码",
"prop": "password",
"type": "password",
"span": 24,
"hide": "true",
"display": true
},
{
"label": "所属角色",
"prop": "role",
"type": "cascader",
"span": 24,
"multiple": true,
"display": true,
"cascaderIndex": 1,
"showAllLevels": true,
"separator": "/",
"props": {
"label": "label",
"value": "value"
},
"required": true,
"rules": [
{
"required": true,
"message": "所属角色必须填写"
}
],
"remote": false
},
{
"label": "状态",
"prop": "status",
"type": "radio",
"span": 24,
"dicData": [
{
"label": "禁用",
"value": "0"
},
{
"label": "正常",
"value": "1"
}
],
"display": true,
"props": {
"label": "label",
"value": "value"
},
"required": true,
"rules": [
{
"required": true,
"message": "状态必须填写"
}
],
"value": "1"
},
{
"label": "最后一次登录时间",
"prop": "last_login_time",
"type": "input",
"span": 24,
"addDisplay": false,
"editDisplay": false
}
]
}',
                'options_type' => '1',
            ),
            5 =>
            array (
                'id' => 6,
                'type' => '0',
                'parent_id' => 3,
                'path' => '/setting/permission/role_manage',
                'redirect' => '',
                'name' => 'role_manage',
                'component' => 'setting/permission/role_manage',
                'title' => '角色管理',
                'icon' => 'el-icon-key',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-04-28 19:14:43',
                'updated_at' => '2022-11-15 08:48:28',
                'tpl_type' => 1,
                'options' => '{
"column": [
{
"label": "上级",
"prop": "parent_id",
"type": "tree",
"span": 24,
"hide": true,
"display": true,
"parent": true,
"props": {
"label": "label",
"value": "value"
},
"dicUrl": "/k-avue/menu/menuList"
},
{
"label": "角色名称",
"prop": "auth_name",
"type": "input",
"span": 24,
"display": true,
"required": true,
"rules": [
{
"required": true,
"message": "角色名称必须填写"
}
]
},
{
"label": "排序",
"prop": "sort",
"type": "number",
"span": 24,
"hide": true,
"controls": true,
"display": true,
"value": "0",
"controlsPosition": "right"
},
{
"label": "菜单权限",
"prop": "menu_ids",
"type": "cascader",
"span": 24,
"multiple": true,
"display": true,
"dicData": [
{
"children": [
{
"label": "选项1-1",
"value": 11
},
{
"label": "选项1-2",
"value": 12
}
],
"value": 0,
"label": "选项一"
},
{
"label": "选项二",
"value": "1"
},
{
"label": "选项三",
"value": "2"
}
],
"cascaderIndex": 1,
"showAllLevels": true,
"separator": "/",
"props": {
"label": "label",
"value": "value",
"desc": "desc"
}
}
],
"labelPosition": "left",
"labelSuffix": "：",
"labelWidth": 120,
"gutter": 0,
"menuBtn": true,
"submitBtn": true,
"submitText": "提交",
"emptyBtn": true,
"emptyText": "清空",
"menuPosition": "center",
"delBtn": true,
"index": true,
"dialogWidth": 500,
"rowKey": "id",
"rowParentKey": "parent_id"
}',
                'options_type' => '1',
            ),
            6 =>
            array (
                'id' => 9,
                'type' => '0',
                'parent_id' => 2,
                'path' => '/setting/explorer',
                'redirect' => '/setting/explorer/file',
                'name' => 'explorer',
                'component' => '',
                'title' => '资源管理',
                'icon' => 'el-icon-folder',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-10-03 03:14:33',
                'updated_at' => '2022-11-15 04:04:01',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            7 =>
            array (
                'id' => 10,
                'type' => '0',
                'parent_id' => 9,
                'path' => '/setting/explorer/file',
                'redirect' => '',
                'name' => 'attachment',
                'component' => 'setting/explorer/attachment_manage',
                'title' => '附件管理',
                'icon' => 'iconfont icon-fujian',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-10-02 03:49:31',
                'updated_at' => '2022-11-22 19:54:06',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            8 =>
            array (
                'id' => 11,
                'type' => '0',
                'parent_id' => 9,
                'path' => '/setting/explorer/icon_manage',
                'redirect' => '',
                'name' => 'icon_manage',
                'component' => 'setting/explorer/icon_manage',
                'title' => '图标管理',
                'icon' => 'iconfont icon-tubiao',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-17 18:36:23',
                'updated_at' => '2022-11-21 11:23:52',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            9 =>
            array (
                'id' => 12,
                'type' => '3',
                'parent_id' => 4,
                'path' => '',
                'redirect' => '',
                'name' => 'menu_add',
                'component' => '',
                'title' => '新增',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-21 13:36:49',
                'updated_at' => '2022-11-21 13:37:28',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            10 =>
            array (
                'id' => 14,
                'type' => '3',
                'parent_id' => 4,
                'path' => '',
                'redirect' => '',
                'name' => 'menu_edit',
                'component' => '',
                'title' => '编辑',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 07:10:11',
                'updated_at' => '2022-11-22 07:10:11',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            11 =>
            array (
                'id' => 15,
                'type' => '3',
                'parent_id' => 4,
                'path' => '',
                'redirect' => '',
                'name' => 'menu_del',
                'component' => '',
                'title' => '删除',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 07:18:39',
                'updated_at' => '2022-11-22 07:18:39',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            12 =>
            array (
                'id' => 16,
                'type' => '3',
                'parent_id' => 4,
                'path' => '',
                'redirect' => '',
                'name' => 'menu_detail_save',
                'component' => '',
                'title' => '详细修改',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 15:52:01',
                'updated_at' => '2022-11-22 23:58:42',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            13 =>
            array (
                'id' => 17,
                'type' => '3',
                'parent_id' => 5,
                'path' => '',
                'redirect' => '',
                'name' => 'admin_manage_add',
                'component' => '',
                'title' => '新增',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 08:01:27',
                'updated_at' => '2022-11-22 08:01:27',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            14 =>
            array (
                'id' => 18,
                'type' => '3',
                'parent_id' => 5,
                'path' => '',
                'redirect' => '',
                'name' => 'admin_manage_edit',
                'component' => '',
                'title' => '编辑',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 08:02:21',
                'updated_at' => '2022-11-22 08:02:21',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            15 =>
            array (
                'id' => 19,
                'type' => '3',
                'parent_id' => 5,
                'path' => '',
                'redirect' => '',
                'name' => 'admin_manage_del',
                'component' => '',
                'title' => '删除',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 16:03:47',
                'updated_at' => '2022-11-22 16:03:47',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            16 =>
            array (
                'id' => 20,
                'type' => '3',
                'parent_id' => 6,
                'path' => '',
                'redirect' => '',
                'name' => 'role_manage_add',
                'component' => '',
                'title' => '新增',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 16:05:06',
                'updated_at' => '2022-11-22 16:05:06',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            17 =>
            array (
                'id' => 21,
                'type' => '3',
                'parent_id' => 6,
                'path' => '',
                'redirect' => '',
                'name' => 'role_manage_edit',
                'component' => '',
                'title' => '编辑',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 16:05:27',
                'updated_at' => '2022-11-22 16:05:27',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            18 =>
            array (
                'id' => 22,
                'type' => '3',
                'parent_id' => 6,
                'path' => '',
                'redirect' => '',
                'name' => 'role_manage_del',
                'component' => '',
                'title' => '删除',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 16:05:39',
                'updated_at' => '2022-11-22 16:05:39',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            19 =>
            array (
                'id' => 23,
                'type' => '3',
                'parent_id' => 11,
                'path' => '',
                'redirect' => '',
                'name' => 'icon_categorys_add',
                'component' => '',
                'title' => '新增分类',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 03:18:56',
                'updated_at' => '2022-12-23 02:24:28',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            20 =>
            array (
                'id' => 24,
                'type' => '3',
                'parent_id' => 11,
                'path' => '',
                'redirect' => '',
                'name' => 'icon_categorys_update',
                'component' => '',
                'title' => '分类编辑',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 19:19:13',
                'updated_at' => '2022-12-23 10:43:53',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            21 =>
            array (
                'id' => 25,
                'type' => '3',
                'parent_id' => 11,
                'path' => '',
                'redirect' => '',
                'name' => 'icon_categorys_del',
                'component' => '',
                'title' => '分类删除',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 19:25:20',
                'updated_at' => '2022-12-23 10:44:23',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            22 =>
            array (
                'id' => 26,
                'type' => '3',
                'parent_id' => 10,
                'path' => '',
                'redirect' => '',
                'name' => 'attachment_add',
                'component' => '',
                'title' => '新增',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-22 19:27:07',
                'updated_at' => '2022-11-22 19:27:07',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            23 =>
            array (
                'id' => 27,
                'type' => '3',
                'parent_id' => 10,
                'path' => '',
                'redirect' => '',
                'name' => 'attachment_edit',
                'component' => '',
                'title' => '编辑',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-11-23 03:27:24',
                'updated_at' => '2022-11-23 03:27:24',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            24 =>
            array (
                'id' => 28,
                'type' => '3',
                'parent_id' => 10,
                'path' => '',
                'redirect' => '',
                'name' => 'attachment_del',
                'component' => '',
                'title' => '删除',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-12-09 05:08:41',
                'updated_at' => '2022-12-09 05:08:41',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            25 =>
            array (
                'id' => 30,
                'type' => '3',
                'parent_id' => 11,
                'path' => '',
                'redirect' => '',
                'name' => 'get_icon_url',
                'component' => '',
                'title' => '编辑三方地址',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-12-23 10:46:05',
                'updated_at' => '2022-12-23 10:47:23',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            26 =>
            array (
                'id' => 31,
                'type' => '3',
                'parent_id' => 11,
                'path' => '',
                'redirect' => '',
                'name' => 'add_icon',
                'component' => '',
                'title' => '新增图标',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-12-23 10:48:25',
                'updated_at' => '2022-12-23 10:48:25',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
            27 =>
            array (
                'id' => 32,
                'type' => '3',
                'parent_id' => 11,
                'path' => '',
                'redirect' => '',
                'name' => 'icon_del',
                'component' => '',
                'title' => '删除图标',
                'icon' => '',
                'isHide' => '0',
                'isKeepAlive' => '1',
                'isAffix' => '0',
                'created_at' => '2022-12-23 10:48:39',
                'updated_at' => '2022-12-23 10:48:39',
                'tpl_type' => 1,
                'options' => '',
                'options_type' => '0',
            ),
        ));


    }
}