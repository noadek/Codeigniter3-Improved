<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * Improved routing adapted from bonfire routing
 * @noadek
 */
require_once APPPATH.'third_party/Route.php';

class MY_Router extends CI_Router
{
    /**
     * Class constructor runs the route mapping function in CI3.
     *
     * @param array $routing Optional configuration values.
     *
     * @return void
     */
    public function __construct($routing = null)
    {
        parent::__construct($routing);

        log_message('info', 'MY_Router class initialized');
    }
}
