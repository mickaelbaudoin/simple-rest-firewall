<?php

namespace SimpleRestFirewall;

/**
 *
 * @author mickael
 */
interface IGroup {
    
    /**
     * @return integer
     */
    public function getGroupId();
    
    /**
     * @return string
     */
    public function getGroupName();
}
