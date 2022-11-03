<?php

use Illuminate\Support\Facades\Route;
use iLzx\AdminStarter\Controls\AdminController;
use iLzx\AdminStarter\Controls\CommonController;
use iLzx\AdminStarter\Controls\MenuController;
use iLzx\AdminStarter\Controls\UserController;

Route::prefix('k-avue')->group(static function () {
    Route::get('/pro', function () {
        return ['avue&kite' => 'v1.0.0'];
    });
    Route::get('test', function () {
        $data = "{
        index: true,
        border: true,
        headerAlign: 'center',
        align: 'center',
        dialogDirection:'rtl',
        dialogType:'drawer',
        defaultExpandAll: false,
        column: [
          {
            type: 'cascader',
            label: '上级菜单',
            span: 13,
            display: true,
            cascaderIndex: 1,
            cascaderItem: [],
            showAllLevels: true,
            separator: '/',
            props: {
              label: 'label',
              value: 'value'
            },
            prop: 'parent_id',
            required: false,
            rules: [],
            dataType: 'string',
            dicData: []
          },
          {
            type: 'input',
            label: '关键字',
            span: 13,
            display: true,
            prop: 'keyword',
            required: true,
            rules: [
              {
                required: true,
                message: '关键字必须填写'
              }
            ],
            labelTip: '关键字唯一',
            labelTipPlacement: ''
          },
          {
            label: '菜单',
            title: '菜单',
            component: 'b-ace-editor',
            span: 24,
            params: {
              value: '',
              lang: 'stylus',
              theme: 'textmate',
              width: '100%',
              height: '300px',
              'font-size': 16,
              wrap: true,
              snippets: true,
              readonly: false,
              options: {},
              styles: {}
            },
            event: {},
            prop: 'content',
            required: true,
            rules: [
              {
                required: true,
                message: '菜单必须填写'
              }
            ],
            labelPosition: 'top'
          }
        ],
        labelPosition: 'top',
        group: [
          {
            label: '数据操作',
            prop: 'curd',
            arrow: false,
            collapse: true,
            display: true,
            column: [
              {
                type: 'select',
                label: '页面类型',
                dicData: [
                  {
                    label: '自定义',
                    value: '0'
                  },
                  {
                    label: 'Form',
                    value: '1'
                  },
                  {
                    label: 'Curd',
                    value: '2'
                  }
                ],
                cascaderItem: [],
                span: 13,
                display: true,
                props: {
                  label: 'label',
                  value: 'value'
                },
                prop: 'page_type',
                dataType: '',
                required: true,
                rules: [
                  {
                    required: true,
                    message: '请选择页面类型'
                  }
                ],
                tipPlacement: 'right',
                labelTip: '不填时对应按钮也不展示',
                control: (val, form) => {
                  if (val === '1') {
                    return {
                      select_url: {
                        display: false
                      }, insert_url: {
                        display: false
                      }, update_url: {
                        display: false
                      }, delete_url: {
                        display: false
                      }, search_url: {
                        display: false
                      }, row_edit_url: {
                        display: false
                      }, save_url: {
                        display: true
                      }, component_object: {
                        display: true
                      }
                    }
                  } else if (val === '2') {
                    return {
                      select_url: {
                        display: true
                      }, insert_url: {
                        display: true
                      }, update_url: {
                        display: true
                      }, delete_url: {
                        display: true
                      }, search_url: {
                        display: true
                      }, row_edit_url: {
                        display: true
                      }, save_url: {
                        display: false
                      }, component_object: {
                        display: true
                      }
                    }
                  } else if (val === '0') {
                    return {
                      select_url: {
                        display: false
                      }, insert_url: {
                        display: false
                      }, update_url: {
                        display: false
                      }, delete_url: {
                        display: false
                      }, search_url: {
                        display: false
                      }, row_edit_url: {
                        display: false
                      }, save_url: {
                        display: false
                      }, component_object: {
                        display: false
                      }
                    }
                  }
                }
              },
              {
                label: '组件对象',
                title: '组件对象',
                component: 'b-ace-editor',
                span: 24,
                params: {
                  value: '',
                  lang: 'stylus',
                  theme: 'textmate',
                  width: '100%',
                  height: '400px',
                  'font-size': 16,
                  wrap: true,
                  snippets: true,
                  readonly: false,
                  options: {},
                  styles: {}
                },
                event: {},
                prop: 'component_object',
                display: false,
                required: true,
                rules: [
                  {
                    required: true,
                    message: '菜单必须填写'
                  }
                ],
                labelPosition: 'top'
              },
              {
                type: 'input',
                label: 'select链接',
                span: 24,
                display: false,
                prop: 'select_url',
                required: true,
                rules: [
                  {
                    required: true,
                    message: 'select链接必须填写'
                  }
                ]
              },
              {
                type: 'input',
                label: 'insert链接',
                span: 24,
                display: false,
                prop: 'insert_url'
              },
              {
                type: 'input',
                label: 'update链接',
                span: 24,
                display: false,
                prop: 'update_url'
              },
              {
                type: 'input',
                label: 'delete链接',
                span: 24,
                display: false,
                prop: 'delete_url'
              },
              {
                type: 'input',
                label: 'search链接',
                span: 24,
                display: false,
                prop: 'search_url'
              },
              {
                type: 'input',
                label: 'rowEdit链接',
                span: 24,
                display: false,
                prop: 'row_edit_url',
                rules: []
              },
              {
                type: 'input',
                label: 'save链接',
                span: 24,
                display: false,
                prop: 'save_url',
                rules: [
                  {
                    required: true,
                    message: 'save链接必须填写'
                  }
                ],
                required: true
              }
            ]
          }
        ]
      }";
        $str  = preg_replace(["/([a-zA-Z_]+[a-zA-Z0-9_]*)\s*:/", "/:\s*'(.*?)'/"], ['"\1":', ': "\1"'], $data);
        $str  = str_replace(['\'', '\\'], ['"', ''], $str);
        echo $str;
        exit();
        $arr = explode(':', trim($string, '{}'));

        foreach ($arr as $a) {
            echo $a;
            echo "<br>";
            $a         = str_replace('\\', '', $a);
            $arr_value = explode(':', $a);
            print_r($arr_value);
            echo "<br>";
            echo "<br>";
        }
        exit();
    });
    Route::get('captcha/{redomstr}', [CommonController::class, 'captcha']);
    Route::post('user/login', [UserController::class, 'login']);
    Route::get('get_options',[AdminController::class, 'getOptions']);

    Route::middleware(['kite.avue'])->group(function () {
        Route::get('getMenu', [MenuController::class, 'getMenu']);
        Route::prefix('menu')->group(function () {
            Route::get('menuDetail/{id}', [MenuController::class, 'menuDetail']);
            Route::put('menuDetailSave', [MenuController::class, 'menuDetailSave']);
            //菜单
            Route::get('menuList', [MenuController::class, 'menuList']);
            Route::post('menuSave', [MenuController::class, 'menuSave']);
            Route::put('menuUpdate', [MenuController::class, 'menuUpdate']);
            Route::delete('menuDelete', [MenuController::class, 'menuDelete']);
        });
        Route::get('user/getTopMenu', [UserController::class, 'getTopMenu']);
        Route::get('user/getUserInfo', [UserController::class, 'getUserInfo']);
    });
});