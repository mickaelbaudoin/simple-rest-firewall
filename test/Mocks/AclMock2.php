<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of AclMock
 *
 * @author mickael baudoin
 */
class AclMock2 implements \SimpleRestFirewall\IAcl{
    
    public function getGroup() {
        return new GroupUserMock();
    }

    public function getOwnerUser() {
        return new \SimpleRestFirewallTest\Mocks\UserMock();
    }

    public function getPermissions() {
        return '0,2,0';
    }

    public function getResourceName() {
        return 'hello2';
    }

}
