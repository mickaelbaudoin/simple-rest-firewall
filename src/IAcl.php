<?php

namespace SimpleRestFirewall;

/**
 * Description of Acl
 *
 * @author mickael
 */
interface IAcl {
    
    /**
     * @return string
     */
    public function getResourceName();
    
    /**
     * @return IUser
     */
    public function getOwnerUser();
    
    /**
     * @return IGroup
     */
    public function getGroup();
    
    /**
     * @return string
     */
    public function getPermissions();
}
