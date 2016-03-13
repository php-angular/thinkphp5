<?php

// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 翟帅干 <zhaishuaigan@qq.com> <http://zhaishuaigan.cn>
// +----------------------------------------------------------------------

namespace think\view\driver;

use think\Config;

class Angular {

    private $template = null;

    public function __construct($config = []) {
        $config         = [
            'tpl_path'   => VIEW_PATH,
            'tpl_suffix' => C('TMPL_TEMPLATE_SUFFIX') ? : '.html',
            'attr'       => 'php-',
        ];
        $this->template = new \Angular($config);
    }

    public function fetch($template, $data = [], $cache = []) {
        // 初始化模板编译存储器
        $config  = Config::get('template');
        $type    = isset($config['compile_type']) ? $config['compile_type'] : 'File';
        $class   = '\\think\\template\\driver\\' . ucwords($type);
        $storage = new $class();

        // 根据模版文件名定位缓存文件
        $tpl_cache_file = CACHE_PATH . 'angular_' . md5($template) . '.php';
        if (APP_DEBUG || !$storage->check($template, $tpl_cache_file)) {
            // 编译模板内容
            $content = $this->template->compiler($template, $data);
            $storage->write($tpl_cache_file, $content);
        }
        $storage->read($tpl_cache_file, $data);
    }

}
