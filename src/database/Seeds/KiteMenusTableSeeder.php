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
                    'component' => 'home/index',
                    'created_at' => '2022-04-29 00:31:00',
                    'icon' => 'iconfont icon-shouye',
                    'id' => 1,
                    'isAffix' => '1',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'home',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 0,
                    'path' => '/home',
                    'redirect' => '',
                    'title' => '控制台',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2023-05-10 00:35:49',
                ),
            1 =>
                array (
                    'component' => '',
                    'created_at' => '2022-04-29 16:38:25',
                    'icon' => 'el-icon-set-up',
                    'id' => 2,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'setting',
                    'options' => NULL,
                    'options_type' => '0',
                    'parent_id' => 0,
                    'path' => '/setting',
                    'redirect' => '/setting/permission',
                    'title' => '系统设置',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-10-03 02:53:28',
                ),
            2 =>
                array (
                    'component' => '',
                    'created_at' => '2022-04-28 08:40:35',
                    'icon' => 'el-icon-postcard',
                    'id' => 3,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'auth',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 2,
                    'path' => '/setting/permission',
                    'redirect' => '/setting/permission/menus',
                    'title' => '权限系统',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-04-28 10:37:02',
                ),
            3 =>
                array (
                    'component' => 'setting/permission/menus',
                    'created_at' => '2022-04-28 00:46:52',
                    'icon' => 'iconfont icon-caidan',
                    'id' => 4,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'menus',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 3,
                    'path' => '/setting/permission/menus',
                    'redirect' => '',
                    'title' => '菜单管理',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-04-28 00:55:11',
                ),
            4 =>
                array (
                    'component' => 'setting/permission/admin_manage',
                    'created_at' => '2022-04-28 10:08:06',
                    'icon' => 'el-icon-user',
                    'id' => 5,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'admin_manage',
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
                    'parent_id' => 3,
                    'path' => '/setting/permission/admin_manage',
                    'redirect' => '',
                    'title' => '管理员管理',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-11-15 00:45:34',
                ),
            5 =>
                array (
                    'component' => 'setting/permission/role_manage',
                    'created_at' => '2022-04-28 11:14:43',
                    'icon' => 'el-icon-key',
                    'id' => 6,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'role_manage',
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
                    'parent_id' => 3,
                    'path' => '/setting/permission/role_manage',
                    'redirect' => '',
                    'title' => '角色管理',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-11-15 00:48:28',
                ),
            6 =>
                array (
                    'component' => '',
                    'created_at' => '2022-10-03 03:14:33',
                    'icon' => 'el-icon-folder',
                    'id' => 9,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'explorer',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 2,
                    'path' => '/setting/explorer',
                    'redirect' => '/setting/explorer/file',
                    'title' => '资源管理',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-11-15 04:04:01',
                ),
            7 =>
                array (
                    'component' => 'setting/log/upload_log',
                    'created_at' => '2022-09-30 11:49:31',
                    'icon' => 'el-icon-upload2',
                    'id' => 10,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'upload_log',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 38,
                    'path' => '/setting/log/upload_log',
                    'redirect' => '',
                    'title' => '文件上传日志',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2023-02-20 07:44:43',
                ),
            8 =>
                array (
                    'component' => 'setting/explorer/icon_manage',
                    'created_at' => '2022-11-17 10:36:23',
                    'icon' => 'iconfont icon-tubiao',
                    'id' => 11,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'icon_manage',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 9,
                    'path' => '/setting/explorer/icon_manage',
                    'redirect' => '',
                    'title' => '图标管理',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2022-11-21 03:23:52',
                ),
            9 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-21 13:36:49',
                    'icon' => '',
                    'id' => 12,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'menu_add',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 4,
                    'path' => '',
                    'redirect' => '',
                    'title' => '新增',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-21 13:37:28',
                ),
            10 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 07:10:11',
                    'icon' => '',
                    'id' => 14,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'menu_edit',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 4,
                    'path' => '',
                    'redirect' => '',
                    'title' => '编辑',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 07:10:11',
                ),
            11 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 07:18:39',
                    'icon' => '',
                    'id' => 15,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'menu_del',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 4,
                    'path' => '',
                    'redirect' => '',
                    'title' => '删除',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 07:18:39',
                ),
            12 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 15:52:01',
                    'icon' => '',
                    'id' => 16,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'menu_detail_save',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 4,
                    'path' => '',
                    'redirect' => '',
                    'title' => '详细修改',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 23:58:42',
                ),
            13 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 08:01:27',
                    'icon' => '',
                    'id' => 17,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'admin_manage_add',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 5,
                    'path' => '',
                    'redirect' => '',
                    'title' => '新增',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 08:01:27',
                ),
            14 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 08:02:21',
                    'icon' => '',
                    'id' => 18,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'admin_manage_edit',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 5,
                    'path' => '',
                    'redirect' => '',
                    'title' => '编辑',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 08:02:21',
                ),
            15 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 16:03:47',
                    'icon' => '',
                    'id' => 19,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'admin_manage_del',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 5,
                    'path' => '',
                    'redirect' => '',
                    'title' => '删除',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 16:03:47',
                ),
            16 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 16:05:06',
                    'icon' => '',
                    'id' => 20,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'role_manage_add',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 6,
                    'path' => '',
                    'redirect' => '',
                    'title' => '新增',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 16:05:06',
                ),
            17 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 16:05:27',
                    'icon' => '',
                    'id' => 21,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'role_manage_edit',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 6,
                    'path' => '',
                    'redirect' => '',
                    'title' => '编辑',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 16:05:27',
                ),
            18 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 16:05:39',
                    'icon' => '',
                    'id' => 22,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'role_manage_del',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 6,
                    'path' => '',
                    'redirect' => '',
                    'title' => '删除',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-11-22 16:05:39',
                ),
            19 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 03:18:56',
                    'icon' => '',
                    'id' => 23,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'icon_categorys_add',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '新增分类',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-12-23 02:24:28',
                ),
            20 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 19:19:13',
                    'icon' => '',
                    'id' => 24,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'icon_categorys_update',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '分类编辑',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-12-23 10:43:53',
                ),
            21 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 19:25:20',
                    'icon' => '',
                    'id' => 25,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'icon_categorys_del',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '分类删除',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-12-23 10:44:23',
                ),
            22 =>
                array (
                    'component' => '',
                    'created_at' => '2022-11-22 11:27:07',
                    'icon' => '',
                    'id' => 26,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'attachment_list',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 10,
                    'path' => '',
                    'redirect' => '',
                    'title' => '查看列表',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2023-02-20 08:09:53',
                ),
            23 =>
                array (
                    'component' => '',
                    'created_at' => '2022-12-23 10:46:05',
                    'icon' => '',
                    'id' => 30,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'get_icon_url',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '编辑三方地址',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-12-23 10:47:23',
                ),
            24 =>
                array (
                    'component' => '',
                    'created_at' => '2022-12-23 10:48:25',
                    'icon' => '',
                    'id' => 31,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'add_icon',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '新增图标',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-12-23 10:48:25',
                ),
            25 =>
                array (
                    'component' => '',
                    'created_at' => '2022-12-23 10:48:39',
                    'icon' => '',
                    'id' => 32,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'icon_del',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '删除图标',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2022-12-23 10:48:39',
                ),
            26 =>
                array (
                    'component' => '',
                    'created_at' => '2023-02-07 21:05:35',
                    'icon' => '',
                    'id' => 33,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'menus_list',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 4,
                    'path' => '',
                    'redirect' => '',
                    'title' => '列表',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2023-02-07 21:05:35',
                ),
            27 =>
                array (
                    'component' => '',
                    'created_at' => '2023-02-08 05:08:30',
                    'icon' => '',
                    'id' => 34,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'admin_manage_list',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 5,
                    'path' => '',
                    'redirect' => '',
                    'title' => '列表',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2023-02-08 05:08:30',
                ),
            28 =>
                array (
                    'component' => '',
                    'created_at' => '2023-02-08 05:09:56',
                    'icon' => '',
                    'id' => 35,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'role_manage_list',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 6,
                    'path' => '',
                    'redirect' => '',
                    'title' => '列表',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2023-02-08 05:09:56',
                ),
            29 =>
                array (
                    'component' => '',
                    'created_at' => '2023-02-08 05:11:38',
                    'icon' => '',
                    'id' => 36,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'icon_categorys_list',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 11,
                    'path' => '',
                    'redirect' => '',
                    'title' => '查看',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2023-02-08 05:11:38',
                ),
            30 =>
                array (
                    'component' => '',
                    'created_at' => '2023-02-14 09:37:36',
                    'icon' => 'iconfont icon-code',
                    'id' => 37,
                    'isAffix' => '0',
                    'isHide' => '1',
                    'isKeepAlive' => '1',
                    'name' => 'develop',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 0,
                    'path' => '/setting/develop',
                    'redirect' => '',
                    'title' => '云开发',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2023-05-08 23:50:42',
                ),
            31 =>
                array (
                    'component' => '',
                    'created_at' => '2023-02-16 02:18:28',
                    'icon' => 'el-icon-notebook-2',
                    'id' => 38,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'log_manage',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 2,
                    'path' => '',
                    'redirect' => '/setting/log/upload_log',
                    'title' => '日志管理',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2023-02-16 02:18:28',
                ),
            32 =>
                array (
                    'component' => 'setting/log/api_log',
                    'created_at' => '2023-04-08 13:57:56',
                    'icon' => 'el-icon-warning-outline',
                    'id' => 39,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'api_log',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 38,
                    'path' => '/setting/log/api_log',
                    'redirect' => '',
                    'title' => '系统日志',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2023-04-08 14:01:45',
                ),
            33 =>
                array (
                    'component' => '',
                    'created_at' => '2023-04-08 13:59:58',
                    'icon' => '',
                    'id' => 40,
                    'isAffix' => '0',
                    'isHide' => '0',
                    'isKeepAlive' => '1',
                    'name' => 'api_log_list',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 39,
                    'path' => '',
                    'redirect' => '',
                    'title' => '查看列表',
                    'tpl_type' => 1,
                    'type' => '3',
                    'updated_at' => '2023-04-08 14:00:17',
                ),
            34 =>
                array (
                    'component' => 'personal/account',
                    'created_at' => '2023-05-09 00:21:57',
                    'icon' => 'el-icon-user',
                    'id' => 46,
                    'isAffix' => '0',
                    'isHide' => '1',
                    'isKeepAlive' => '1',
                    'name' => 'personal_account',
                    'options' => '',
                    'options_type' => '0',
                    'parent_id' => 0,
                    'path' => '/personal/account',
                    'redirect' => '',
                    'title' => '个人中心',
                    'tpl_type' => 1,
                    'type' => '0',
                    'updated_at' => '2023-05-11 00:03:58',
                ),
        ));


    }
}