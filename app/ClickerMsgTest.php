<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/ClickerMsg.php';
//
use \PHPUnit\Framework\TestCase;
/**
 * 
 */
class ClickerMsgTEST extends TestCase
{
	public function msgTest()
	{
		# code...
		//
		$msg = new ClickerMsg(['secretId' => "AKIDxmLyNX4bQlqeLor4Y5VflbDAB0pOq5Yp",
								'secretKey' => "Oq5HExfhU9pJqJfPsHTRRkoogLvPc5kA",
								'env' => "ceshi-8gwpyd0m833c3f9f",
								'table' => "timu_answer"]
							);
		//
		$str = '{"snr":13,"localtime":1609860590,"csq":25,"cc":1003,"vbat":3001,"imei":"XPkdQO1nrC9qdOhUTDfDlddKkN3SyyJY","key":3,"rssi":27,"conn_duration":10,"rsrp":-69}';
		//
		$msg->save($str);
	}
}
