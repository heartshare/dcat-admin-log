<?php

namespace Dcat\Admin\Satan\Admin\Log;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Satan\Admin\Log\Http\Middleware\LogOperation;

class DcatAdminLogServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/index.js',
    ];
	protected $css = [
		'css/index.css',
	];
    // 定义菜单
    protected $menu = [
        [
            'title' => 'Operation Log',
            'uri'   => 'satan/dcat-admin-log',
            'icon'  => '',
        ]
    ];
	public function register()
	{
		//
	}
	public function settingForm()
	{
		return new Setting($this);
	}
}
