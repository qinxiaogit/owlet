<?php
/**
 * @Author: xiao
 * @Date  :   17/09/25 17:09
 * @Email :  qinxiaolove@gmail.com
 * @File  :   server.config.php
 * @Desc  :   
 */
define('SERVER_LISTEN_HTTP_IP', '0.0.0.0');
define('SERVER_LISTEN_TCP_IP', '0.0.0.0');
define('SERVER_LISTEN_HTTP_PORT', 6666);
define('SERVER_LISTEN_TCP_PORT', 6666);
define('DOMAIN', 'proxy.local');//domain

$aRepoConfig = array(
    'test' => '/bin/sh ' . WORKSPACE . DS . 'scripts' . DS . 'test.sh >> ' . WORKSPACE . DS . 'logs/git.log',
    'owlet' => '/bin/sh ' . WORKSPACE . DS . 'scripts' . DS . 'test.sh >> ' . WORKSPACE . DS . 'logs/git.log',
);

?>