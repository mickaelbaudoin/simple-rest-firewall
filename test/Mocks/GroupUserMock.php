<?php

namespace SimpleRestFirewallTest\Mocks;

/**
 * Description of GroupMock
 *
 * @author mickael baudoin
 */
class GroupUserMock implements \SimpleRestFirewall\IGroup{
    
    public function getGroupId() {
        return 2;
    }

    public function getGroupName() {
        return 'USER';
    }

}
