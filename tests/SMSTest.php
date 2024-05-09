<?php
namespace UTel\SDK\Tests;

use UTel\SDK\UTel;
use GuzzleHttp\Exception\GuzzleException;

#[\AllowDynamicProperties]
class SMSTest extends \PHPUnit\Framework\TestCase
{

	public function setUp(): void
	{
		$this->client = new UTel('sms', 'http://utlhq407:9191/api/sms', 'VmFzQXBwOlZhc0RldkAxMjM0');
	}

	public function testSMSWithEmptyMessage()
	{
        $response = $this->client->sms()->send([
        	'sender' => 'UTel',
            'to' => '716094006',
        ]);

        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('error',$response['status']);
	}

	public function testSMSWithEmptyRecipient()
	{
        $response = $this->client->sms()->send([
        	'sender' => 'UTel',
            'message' => 'Testing...'
        ]);

        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('error',$response['status']);
	}

	public function testSingleSMSSending()
	{
		$response = $this->client->sms()->send([
			'sender'    => 'UTel',
			'to' 		=> '716094006', 
			'message' 	=> 'Testing SMS...'
		]);
		
		$this->assertEquals('"Message Sent."', $response['data']);
	}
}