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
     *
     * {@inheritDoc}
     * @see \asbamboo\helper\arr\ArrayHelperInterface::resetKey()
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

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\helper\arr\ArrayHelperInterface::resetKeyObjectArray()
     */
    public static function resetObjectsKey(array $objects, array $unikeys) : array
    {
        $result         = [];
        foreach($objects AS $key => $object){
            $resets     = [];
            foreach($unikeys AS $unikey){
                $resets[]   = $object->{$unikey};
            }
            $result[implode('_', $resets)]  = $object;
            unset($objects[$key]);
        }
        return $result;
    }
}
