> 此项目是php-angular在thinkphp5中使用的驱动, 可在tp5项目中使用composer安装, 安装后配置模板引擎为`Angular`即可.  

## 1. 安装composer

教程: http://www.phpcomposer.com

## 2. 安装驱动  
```
composer require php-angular/thinkphp5
```

## 3. 修改或添加项目配置文件的模板引擎为Angular  

// config.php
```
'template' => [
    'type' => 'Angular',
],
```

## 资源教程

1. 核心模板解析库: https://github.com/php-angular/php-angular  
2. thinkphp5: https://github.com/top-think/think
