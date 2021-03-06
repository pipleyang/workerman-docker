<?php
require_once __DIR__ . '/vendor/autoload.php';
// 初始化示例
use TencentCloudBase\TCB;

/**
 * 
 */
class ClickerMsg extends Tcb
{
	//表格
	private $table;
	//
	private $collection;
	function __construct($argument = array())
	{
		# code...
		// 初始化资源
		// 云函数下不需要secretId和secretKey。
		// env如果不指定将使用默认环境
		try {
			parent::__construct([
								'secretId'=> $argument['secretId'],
								'secretKey'=> $argument['secretKey'],
								'env'=> $argument['env']
							]
							);
			//
			$this->table = $argument['table'];
			// 获取 集合的引用
			$this->collection = $this->getDatabase()->collection($argument['table']);
		} catch (Exception $e) {
			
		}
		
		
	}
	/*
	*接收终端消息处理
	{"snr":13,"localtime":1609860590,"csq":25,"cc":1003,"vbat":3001,"imei":"XPkdQO1nrC9qdOhUTDfDlddKkN3SyyJY","key":3,"rssi":27,"conn_duration":10,"rsrp":-69}
	*/
	public function save($sMsg = ""){
		//
		try {
			$msg = json_decode($sMsg);
			//
			$rst = $this->collection->add($msg);
			var_dump($rst);
		} catch (Exception $e) {
			echo $e;
		}
		
	}
}
/*
$msg = new ClickerMsg(['secretId' => "AKIDxmLyNX4bQlqeLor4Y5VflbDAB0pOq5Yp",
								'secretKey' => "Oq5HExfhU9pJqJfPsHTRRkoogLvPc5kA",
								'env' => "ceshi-8gwpyd0m833c3f9f",
								'table' => "timu_answer"]
							);
$str = '{"snr":13,"localtime":1609860590,"csq":25,"cc":1003,"vbat":3001,"imei":"XPkdQO1nrC9qdOhUTDfDlddKkN3SyyJY","key":3,"rssi":27,"conn_duration":10,"rsrp":-69}';
		//
$rst = $msg->save($str);
var_dump($rst);
*/