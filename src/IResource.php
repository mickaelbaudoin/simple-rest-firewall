<?php

namespace MB\SimpleRestFirewall;

/**
 *
 * @author mickael
 */
interface IResource {
    
    /**
     * @return IUser
     */
    public function getOwnerUser();
    
    /**
     * @return string
     */
    public function getResourceName();
}
