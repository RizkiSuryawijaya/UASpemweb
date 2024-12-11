
<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell
 */

$uri = $_SERVER['REQUEST_URI'];

// Check if we're running in a subdirectory and adjust the path accordingly.
if ($uri !== '/' && file_exists(__DIR__.'/../public'.$uri)) {
    return false;
}

require_once __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
