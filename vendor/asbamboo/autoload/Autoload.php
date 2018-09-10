<?php
namespace asbamboo\autoload;

/**
 * 使用例子:
 *  - $Autoload = new asbamboo/autoload/Autoload();
 *  - $Autoload->addMappingDir('modal', __DIR__ . '/modal');
 * 
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年3月11日
 */
class Autoload
{
    /**
     * [命名空间namespace => '命名空间dir'][]
     * @var array
     */
    protected $mapping  = [];

    /**
     * 
     */
    public function __construct()
    {
        spl_autoload_register([$this, 'load']);
    }

    /**
     * 将新的$mapping数组添加到 $mapping，如果新的namespace在原来的$mapping中存在，将会替换使用新的namespace dir
     * @param array $mapping
     * @return \asbamboo\autoload\Autoload
     */
    public function setMapping(array $mapping) : self
    {
        foreach( $mapping AS $namespace => $dir){
            $this->addMappingDir($namespace, $dir);
        }
        return $this;
    }
    
    /**
     * 判断 $namespace mapping信息是否存在
     * @param string $namespace
     * @return bool
     */
    public function hasMapping(string $namespace) : bool
    {
        return isset($this->mapping[$namespace]);
    }
    
    /**
     * 添加一个namespace映射关系。如果原先已经存在，用现在的替换 
     * @param string $namespace
     * @param string $dir
     * @return self
     */
    public function addMappingDir(string $namespace, string $dir) : self
    {
        $this->mapping[$namespace] = rtrim( $dir, DIRECTORY_SEPARATOR ) . DIRECTORY_SEPARATOR;
        return $this;
    }
    
    /**
     *  自动加载$class
     * @param string $class
     */
    public function load(string $class ) : void
    {
        /*
         * asbamboo的根命名空间
         */
        $asbamboo_namespace = strstr(__NAMESPACE__, '\\', true);
        if(!$this->hasMapping($asbamboo_namespace)){
            $this->addMappingDir($asbamboo_namespace, dirname(__dir__));
        }

        /*
         * 先逆向排序mapping数组，保证先判断子命名空间。然后判断类文件存在的话，include该文件。
         */
        if(krsort($this->mapping)){
            foreach($this->mapping AS $namespace => $dir )
            {
                $class_data      = explode('\\', $class);
                foreach($class_data AS $index => $data)
                {
                    if(!isset($class_data[$index + 1])){
                        break;
                    }
                    $class_data[$index] = strtolower(trim(preg_replace('@([A-Z])@', '-$1',$data),'-'));
                }
                $class_data     = implode('\\', $class_data);
                $class_path = trim(str_replace([$namespace, '\\'], ['', DIRECTORY_SEPARATOR], $class_data), DIRECTORY_SEPARATOR) . '.php';
                $test_path  = $dir . $class_path;
                if(file_exists( $test_path )){
                    include $test_path;
                }
            }
        }
    }
}