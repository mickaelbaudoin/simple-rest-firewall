<?php

namespace MB\SimpleRestFirewall;

/**
 *
 * @author mickael
 */
interface IAclService {
    /**
     * @param $resource string 
     * @return IAcl
     */
    public function findAclByResourceName($resource);
}
