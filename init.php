<?php

$http = new swoole_http_server("0.0.0.0", 80);
$http->on('request', function ($request, $response) {
	$response->write($request->headers);
    $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
});
$http->start();

?>
