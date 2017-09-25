<?php
date_default_timezone_set('Asia/Shanghai');

define('DS', DIRECTORY_SEPARATOR);
define('WORKSPACE', __DIR__);

require_once WORKSPACE . DS .'config'.DS. 'server.conf.php';
require_once WORKSPACE . DS .'function'.DS. 'helper.php';

class server{
	public  $_http = null;
	public function __construct(){
		$this->_http = new swoole_http_server(SERVER_LISTEN_HTTP_IP, SERVER_LISTEN_HTTP_PORT);
		$this->init();
		$this->_http->on('request',[$this,'onRequest']);
		$this->_http->on('Task',[$this,'onTask']);
		$this->_http->on('finish',[$this,'onfinsh']);
		$this->_http->start();
	}
	/**
	* init
	*/
	public function init(){
		$this->_http->set([
				'task_worker_num'=>200
			]);
	}
	public function onRequest($request,$response){
		$host = $request->header['host'];
		$host = $this->hanlde_host($host);
		if(DOMAIN!=$host){
			$response->end($host);
		}
		$this->_http->task($this->getUri($request->header));
		$response->end('200');
		// $response->write(json_encode($request->header));
  //   	$response->end("<h1>Hello owlet. #".rand(1000, 9999)."</h1>");
	}
	public function hanlde_host($host){
		$hostArray =  explode(':',$host);
		return isset($hostArray[0])?$hostArray[0]:'';
	}
	/**
	*
	*/
	public function getUri($header){
		$requestUrl = isset($header['request-url'])?$header['request-url']:'';
		$regex = '/[a-zA-Z]+/i';
        if(preg_match($regex,$requestUrl,$match)){
        	return $match[0];
        }
        return '';
	}
	/**
	* test task
	**/
	public function onTask($serv, $task_id, $from_id,  $data){
		$bash = getConfig($data);
		if(!$bash){
			return ;
		}
		echo exec($bash); 
	}
	/**
	** onfinsh
	*/
	public  function onfinsh(){
		echo 'finsh'."\n";
	}
}
$serveObj = new server();
?>
