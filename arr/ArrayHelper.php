<?php
namespace asbamboo\helper\arr;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年12月4日
 */
class ArrayHelper implements ArrayHelperInterface
{
    /**
     * 重置数组的key
     *
     * @param array $array 准备重置key的数组
     * @param array $unikey_fields 表示数组中唯一key的键名
     * @return array
     */
    public static function resetKey(array $array, array $unikey_fields) : array
    {
        $result         = [];
        foreach($array AS $key => $item){
            $resets     = [];
            foreach($unikey_fields AS $unikey){
                $resets[]   = $item[$unikey];
            }
            $result[implode('_', $resets)]  = $item;
            unset($array[$key]);
        }
        return $result;
    }
}
