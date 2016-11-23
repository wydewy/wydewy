<?php
namespace core;
class wydewy{
	
	/**
	 *儲存所有自動加載的類
	*/
    public static $classMap = array();
	
	//启动框架
    static public function run(){
       $route = new \core\lib\route();//啓動路由
	   $ctrName = $route->ctr;
	   $actionName = $route->action;   
	   if(DEBUG){
			//p($ctrName);
			//p($actionName);
			//p($_GET);
		}
		$classFile = WYDEWY.'/'.MODULE.'/ctr/'.$ctrName.'Ctr.php';
		$class = '\\'.MODULE.'\\ctr\\'.$ctrName.'Ctr';
		//p($classFile);
		if(is_file($classFile)){
			$ctr = new $class();
			$ctr->$actionName();
		}else{
			
			if(DEBUG){
				p('ctroller '.$ctrName.' not found ');
			}else{
				
			}
		}
		
		
    }
    
    //自动加载类
    static public function load($class){
		//p($class);
        $class = str_replace('\\','/',$class);
		
        $file = WYDEWY.'/'.$class.'.php';//這個類的文件全路徑
		
        // p($file);exit();
        if(isset($classMap[$class])){
            return true;
        }else{
            if(is_file($file)){
                include $file;
                $classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }

}

