<?php
namespace asbamboo\helper\env;

/**
 * 全局环境变量的设置与获取
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月10日
 */
interface EnvInterface
{
    /**
     * 设置
     *
     * @param string $key
     * @param mixed $value
     */
    static public function set(string $key, $value) : void;

    /**
     * 返回环境变量$key是否存在
     *
     * @param string $key
     * @return bool
     */
    static public function has(string $key) : bool;

    /**
     * 返回
     *
     * @param string $key
     */
    static public function get(string $key);
}