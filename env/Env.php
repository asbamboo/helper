<?php
namespace asbamboo\helper\env;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月10日
 */
class Env implements EnvInterface
{
    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\helper\env\EnvInterface::set()
     */
    static public function set(string $key, $value): void
    {
        $_ENV[$key] = $value;
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\helper\env\EnvInterface::has()
     */
    static public function has(string $key) : bool
    {
        return isset($_ENV[$key]);
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\helper\env\EnvInterface::get()
     */
    static public function get(string $key)
    {
        if(static::has($key)){
            return $_ENV[$key];
        }
    }
}