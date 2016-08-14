<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of RouterMock
 *
 * @author mickael baudoin
 */
class RouterMock implements \SimpleRestFirewall\IRouter{
    
    protected static $routes = array();
    
    public function addRoute($name, $uri) {
        $this->routes[$name] = $uri;
        return $this;
    }

    public function getUri($name) {
        if(isset($this->routes[$name]) && is_string($this->routes[$name])){
            return $this->routes[$name];
        }
        
        return null;
    }

    public function getRouteName($uri){
        $key = array_search($uri, $this->routes);
        if($key !== false){
            return $key;
        }
        
        return null;
    }
}
