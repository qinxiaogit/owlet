<?php
class server{
	public  $_http = null;
	public function __construct(){
		$this->_http = new swoole_http_server("0.0.0.0", 80);
		$this->_http->on('request',[$this,'onRequest']);
		$this->_http->start();
	}
	public function onRequest($request,$response){
		$response->write(json_encode($request->header));
    		$response->end("<h1>Hello owlet. #".rand(1000, 9999)."</h1>");
	}
}

// $http = new swoole_http_server("0.0.0.0", 80);
// $http->on('request', function ($request, $response) {
// 	$response->write(json_encode($request->header));
//     $response->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
// });
// $http->start();
$serveObj = new server();
?>
