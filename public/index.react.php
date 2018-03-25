<?php

use App\Kernel;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../vendor/autoload.php';

// The check is to ensure we don't use .env in production
if (!isset($_SERVER['APP_ENV'])) {
    if (!class_exists(Dotenv::class)) {
        throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
    (new Dotenv())->load(__DIR__ . '/../.env');
}

$env   = $_SERVER['APP_ENV'] ?? 'dev';
$debug = $_SERVER['APP_DEBUG'] ?? ('prod' !== $env);

if ($debug) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts(explode(',', $trustedHosts));
}

$kernel = new Kernel($env, $debug);

$server = new React\Http\Server(function (\Psr\Http\Message\ServerRequestInterface $request) use ($kernel) {
    // map the request
    $requestMap     = new \App\React\Request($request);
    $symfonyRequest = $requestMap->map();

    // handle the request and return symfony response object
    $sfResponse = $kernel->handle($symfonyRequest);

    return new React\Http\Response(
        $sfResponse->getStatusCode(),
        ['Content-Type: ' . $symfonyRequest->headers->get('Content-Type')],
        $sfResponse->getContent()
    );
});

$loop   = React\EventLoop\Factory::create();
$socket = new React\Socket\Server(8080, $loop);
$server->listen($socket);

echo "Server running at http://127.0.0.1:8080\n";

$loop->run();
