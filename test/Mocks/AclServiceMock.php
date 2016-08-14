<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of AclServiceMock
 *
 * @author nagi
 */
class AclServiceMock implements \SimpleRestFirewall\IAclService{
    
    public function findAclByResourceName($resource) {
        if($resource == 'hello'){
            return new AclMock();
        }
        
        if($resource == 'hello2'){
            return new AclMock2();
        }
        
        return null;
    }

}
