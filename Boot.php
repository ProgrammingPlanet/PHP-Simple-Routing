<?php

class Route
{
	private static $routes = [];

	public function get($action, $file)
	{
	    $action = trim($action, '/');
	    self::$routes[$action] = $file;
	}

	public function dispatch($action0)
	{
	    
	    $routes = self::$routes;
	    foreach ($routes as $uri_segs => $route) {

	    	$action = array_reverse(explode('/', trim($action0, '/')));
	    	$uri_segs = array_reverse(explode('/', $uri_segs));

	    	if(count($uri_segs) !=  count($action)){
	    		continue;
	    	}
	    	$params = [];

	    	foreach ($uri_segs as $key => $seg) {
		    	if(strlen($seg) >= 2){
				    if($seg[0]=='{' && substr($seg,-1)=='}'){
				        $params[substr($seg,1,strlen($seg)-2)] = $action[$key];
				        unset($action[$key]);
				    }else
				        break;
				}
		    }
	    	$action = implode('/',array_reverse($action));
	    	$file = $route;

	    	$target = $target = 'files/'.$file.'.php';
	    	if(file_exists($target)){
	    		$params = array_reverse($params);
		    	require $target;			// echo call_user_func($callback);
		    	$flag = 'complete';
		    	break; 
		    }else{
		    	$params = [];
		    }
	    }
	    if(isset($flag) && $flag == 'complete'){
	    	//request complete
	    	return 0;
	    }else{
	    	echo "404 File not found.";
	    }
	    
   					
	}


}