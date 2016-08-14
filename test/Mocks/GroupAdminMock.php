<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of GroupMock
 *
 * @author mickael baudoin
 */
class GroupAdminMock implements \SimpleRestFirewall\IGroup{
    
    public function getGroupId() {
        return 1;
    }

    public function getGroupName() {
        return 'ADMIN';
    }

}
