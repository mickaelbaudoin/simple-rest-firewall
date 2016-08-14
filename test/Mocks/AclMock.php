<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of AclMock
 *
 * @author mickael baudoin
 */
class AclMock implements \SimpleRestFirewall\IAcl{
    
    public function getGroup() {
        return new GroupAdminMock();
    }

    public function getOwnerUser() {
        return new \SimpleRestFirewallTest\Mocks\UserMock();
    }

    public function getPermissions() {
        return '6,2,0';
    }

    public function getResourceName() {
        return 'hello';
    }

}
