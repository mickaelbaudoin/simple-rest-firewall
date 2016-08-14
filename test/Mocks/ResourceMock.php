<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of ResourceMock
 *
 * @author mickael baudoin
 */
class ResourceMock implements \SimpleRestFirewall\IResource {
    
    public function getOwnerUser() {
        return new SimpleRestFirewallTest\Mocks\UserMock();
    }

    public function getResourceName() {
        return 'hello';
    }

}
