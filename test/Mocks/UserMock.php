<?php

namespace SimpleRestFirewallTest\Mocks;

class UserMock implements \SimpleRestFirewall\IUser{
    
    public function getGroups() {
        return [];
    }

    public function getLogin() {
        return 'test';
    }

    public function getToken() {
        return '11110000';
    }

    public function getTokenDateExpired() {
        
    }

    public function getUserId() {
        return 1;
    }

    public function setToken($token) {
        
    }

}