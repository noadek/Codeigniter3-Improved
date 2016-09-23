<?php

// Set whoops error handler for display
if (getenv('APP_ENV') == 'development') {
    $whoops = new Whoops\Run();
    // Configure the PrettyPageHandler:
    $errorPage = new Whoops\Handler\PrettyPageHandler();
    $errorPage->setPageTitle("It's broken!"); // Set the page's title
    $errorPage->setEditor("sublime");         // Set the editor used for the "Open" link
    $whoops->pushHandler($errorPage);

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    	$whoops->pushHandler(new Whoops\Handler\JsonResponseHandler());
    }

    $whoops->register();
}

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
        $value = getenv($key);

        if ($value === false) {
            return value($default);
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        /*if (strlen($value) > 1 && Str::startsWith($value, '"') && Str::endsWith($value, '"')) {
            return substr($value, 1, -1);
        }*/

        return $value;
    }
}
