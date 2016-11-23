<?php
/**
 * 定义常量
 * 加载函数库
 * 启动框架
 */
 
//定义常量
define('MODULE','app');//模塊名稱

define('WYDEWY',realpath('.'));
define('CORE',WYDEWY.'/core');
define('APP',WYDEWY.'/'.MODULE);
define('DEBUG',true);
#define('_PHP_FILE_',$_SERVER['SCRIPT_NAME']);
if(DEBUG){
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}else{
    ini_set('display_errors', 'Off');
}

//加载函数库
$fun_path = CORE.'/common/function.php';
include $fun_path;
$core_path =  CORE.'/wydewy.php';
include $core_path;

//启动框架
spl_autoload_register('\core\wydewy::load');//new一個不存在的類的時候 會調用這個方法，而達到自動加載類的作用
\core\wydewy::run();//啓動框架

?>
