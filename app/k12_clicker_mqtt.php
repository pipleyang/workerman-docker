<?php
require_once __DIR__ . '/vendor/autoload.php';
use Workerman\Worker;
$worker = new Worker();
$worker->onWorkerStart = function(){
	$options = array(
						'keepalive' => 90,
						'client_id' => "b827ebece3a78",
						'username' => "admin",
						'password' => "BXGDsT5HDxhhq&yO",
						'clean_session' => true,
						'protocol_name' => "MQTT",
						'protocol_level' => 4
					);

    $mqtt = new Workerman\Mqtt\Client('mqtt://emqtt.santiy.com:1883', $options);
    $mqtt->onConnect = function($mqtt) {
        $mqtt->subscribe('test');
    };
    $mqtt->onMessage = function($topic, $content){
        var_dump($topic, $content);
    };
    $mqtt->connect();
};
Worker::runAll();
