<?php
/**
 * 加载composer自带的autoload
 * 返回一个初始化Autoload
 */
if(file_exists(__DIR__ . '/vendor/autoload.php')){
    require_once __DIR__ . '/vendor/autoload.php';
}else{
    require_once dirname(dirname(__DIR__)) . '/autoload.php';
}

return new asbamboo\autoload\Autoload();