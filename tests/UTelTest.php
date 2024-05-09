<?php
namespace UTel\SDK\Tests;

use UTel\SDK\UTel;
use GuzzleHttp\Exception\GuzzleException;

#[\AllowDynamicProperties]
class UTelTest extends \PHPUnit\Framework\TestCase
{
	
	public function testSMSClass()
	{
		$client 	= new UTel('http://utlhq407:9191/api/sms', '');

		$this->assertInstanceOf(\UTel\SDK\SMS::class, $client->sms());
	}
	
	public function testEmailClass()
	{
		$client 	= new UTel('http://utlhq407:9192/api/Email', '');

		$this->assertInstanceOf(\UTel\SDK\Email::class, $client->email());
	}
}