<?php
namespace asbamboo\helper\traits;

/**
 * 单例模式通用方法
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018-02-28
 */
trait SingletonClassTrait
{
    /**
     * 类的实例
     * @var object
     */
    protected static $instance;

    /**
     * 使类不能被初始化
     */
    protected function __construct(){}

    /**
     * 创建并获取类的实例
     * @return object
     */
    public static function instance() : object
    {
        if(! static::$instance){
            static::$instance    = new static();
        }
        return static::$instance;
    }

    /**
     * 不允许将类的实例序列化后存储
     */
    final private function __sleep(){}

    /**
     * 不允许将类的实例的序列化值反序列化
     */
    final private function __wakeup(){}

    /**
     * 不允许复制类的实例
     */
    final private function __clone(){}
}