<?php

namespace MB\SimpleRestFirewall;

use Psr\Http\Message\ServerRequestInterface;


/**
 *
 * @author mickael
 */
interface IUserService {
    
    public function findUserByFilters(ServerRequestInterface $request);
    
    public function generateToken(IUser $user);
}
