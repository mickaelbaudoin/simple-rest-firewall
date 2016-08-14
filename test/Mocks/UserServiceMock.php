<?php

namespace SimpleRestFirewallTest\Mocks;

class UserServiceMock implements \SimpleRestFirewall\IUserService{
    
    public function findUserByFilters(\Psr\Http\Message\ServerRequestInterface $request) {
        $token = $request->getHeader('X-token');
        if($token == '11110000'){
            $user = new \SimpleRestAuthTest\Mocks\UserMock();
            return $user;
        }
        return null;
    }

    public function generateToken(\SimpleRestFirewall\IUser $user) {
        return $user;
    }

}