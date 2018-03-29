<?php

namespace MB\SimpleRestFirewall;

use Psr\Http\Message\ServerRequestInterface;


/**
 *
 * @author mickael
 */
interface IUserService {

    public function findUserByToken(sring $token);

}
