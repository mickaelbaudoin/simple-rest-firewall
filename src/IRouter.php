<?php

namespace MB\SimpleRestFirewall;

/**
 *
 * @author mickael baudoin
 */
interface IRouter {
    public function addRoute($name,$uri);
    public function getRouteName($uri);
    public function getUri($name);
}
