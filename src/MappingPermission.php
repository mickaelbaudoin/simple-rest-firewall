<?php

namespace MB\SimpleRestFirewall;

/**
 * Description of MappingPermission
 *
 * @author mickael
 */
abstract class MappingPermission {
    const ALL = 6;
    const READ = 2;
    const DENY_ALL = 0;
    
    static function getPermissionRequiredByMethod($method){
            switch ($method){
                case 'POST':
                    return self::ALL;
                case 'PUT':
                    return self::ALL;
                case 'DELETE':
                    return self::ALL;
                case 'GET':
                    return self::READ;
                default :
                    return self::DENY_ALL;
            }
    }
}
