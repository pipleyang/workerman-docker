<?php
require_once __DIR__ . '/vendor/autoload.php';
//初始化workerman
use Workerman\Worker;
//
$worker = new Worker();
$worker->onWorkerStart = function(){
	//
	$client_id = "b827ebece3a78";
	//
	$username = "IgnMssu5";
	//
	$password = "n44eKX!O@HA5E7am";
	//
	$Topic = "test";
	//
	$Host = "mqtt://emqtt.santiy.com";
	//
	$Port = "1883";
	//
	$options = array(
						'keepalive' => 90,
						'client_id' => $client_id,
						'username' => $username,
						'password' => $password,
						'clean_session' => true,
						'protocol_name' => "MQTT",
						'protocol_level' => 4
					);
	//
    $mqtt = new Workerman\Mqtt\Client(sprintf("%s:%s", $Host, $Port), $options);
    $mqtt->onConnect = function($mqtt) {
        $mqtt->subscribe($Topic);
    };
    $mqtt->onMessage = function($topic, $content){
        var_dump($Topic, $content);
    };
    $mqtt->connect();
};
Worker::runAll();
