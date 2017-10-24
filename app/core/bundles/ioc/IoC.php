<?php
namespace app\core\bundles\ioc;

class IoC{
    public static $services = [];
    private static $app = null;
    public static function init(){
        self::$app = new IoC();
    }
    public static function bind($serviceName, $callback){
        self::$services[$serviceName] = $callback;
    }
    public static function resolve($serviceName){
        return call_user_func(IoC::$services[$serviceName], self::$app);
    }
}