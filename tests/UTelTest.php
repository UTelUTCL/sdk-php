<?php
namespace UTel\SDK\Tests;

use UTel\SDK\UTel;
use GuzzleHttp\Exception\GuzzleException;

#[\AllowDynamicProperties]
class UTelTest extends \PHPUnit\Framework\TestCase
{
	
	public function testSMSClass()
	{
		$client 	= new UTel('sms', 'http://utlhq407:9191/api/sms', 'VmFzQXBwOlZhc0RldkAxMjM0');

		$this->assertInstanceOf(\UTel\SDK\SMS::class, $client->sms());
	}
}