<?php

namespace MB\SimpleRestFirewall;

/**
 *
 * @author mickael baudoin
 */
interface IRouter {
    public function getRouteName($uri);
}
