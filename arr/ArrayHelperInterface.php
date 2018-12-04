<?php
namespace asbamboo\helper\arr;

/**
 * 数组辅助方法
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年12月4日
 */
interface ArrayHelperInterface
{
    /**
     * 重置数组的key
     *
     * @param array $array 准备重置key的数组
     * @param array $unikey_fields 表示数组中唯一key的键名
     * @return array
     */
    public static function resetKey(array $array, array $unikey_fields) : array;

    /**
     * 重置由多个对象组成的数组的key
     *
     * @param array $objects
     * @param array $unikeys
     * @return array
     */
    public static function resetObjectsKey(array $objects, array $unikeys) : array;
}
