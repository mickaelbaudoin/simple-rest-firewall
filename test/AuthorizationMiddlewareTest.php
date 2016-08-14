<?php

namespace SimpleRestFirewallTest;

use PHPUnit\Framework\TestCase;

/**
 * Description of AuthorizationMiddlewareTest
 *
 * @author mickael baudoin
 */
class AuthorizationMiddlewareTest extends TestCase{
    
    public function testGrantedResource(){
        $headers = array('X-token' => '11110000');
        $user = new \SimpleRestFirewallTest\Mocks\UserMock();
        $router = new Mocks\RouterMock();
        $router->addRoute('hello', 'https://localhost/hello');
        $request = new \GuzzleHttp\Psr7\ServerRequest('GET', 'https://localhost/hello', $headers);
        $response = new \GuzzleHttp\Psr7\Response();
        $callback = function() use ($response) {return $response;};
        
        $aclService = new Mocks\AclServiceMock();
        $middleware = new \SimpleRestFirewall\AuthorizationMiddleware($user,$aclService,$router);
        $reponseServer = $middleware($request,$response,$callback);
        
        $this->assertEquals(200, $reponseServer->getStatusCode());
    }
    
    public function testUnauthorizedResource(){
        $headers = array('X-token' => '11110000');
        $user = new \SimpleRestFirewallTest\Mocks\UserMock();
        $router = new Mocks\RouterMock();
        $router->addRoute('hello2', 'https://localhost/hello2');
        $request = new \GuzzleHttp\Psr7\ServerRequest('GET', 'https://localhost/hello2', $headers);
        $response = new \GuzzleHttp\Psr7\Response();
        $callback = function() use ($response) {return $response;};
        
        $aclService = new Mocks\AclServiceMock();
        $middleware = new \SimpleRestFirewall\AuthorizationMiddleware($user,$aclService,$router);
        $reponseServer = $middleware($request,$response,$callback);
        
        $this->assertEquals(403, $reponseServer->getStatusCode());
    }
}
