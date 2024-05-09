<?php
namespace UTel\SDK\Tests;

use UTel\SDK\UTel;
use GuzzleHttp\Exception\GuzzleException;

#[\AllowDynamicProperties]
class EmailTest extends \PHPUnit\Framework\TestCase
{

	public function setUp(): void
	{
		$this->client = new UTel('email', 'http://utlhq407:9192/api/Email');
	}

	public function testEmailWithEmptyMessage()
	{
        $response = $this->client->email()->send([
        	'from' => 'UTel',
            'to' => 'obua.emmanuel@utcl.co.ug',
        ]);
		
		var_dump($response);

        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('error',$response['status']);
	}

	public function testEmailWithEmptyRecipient()
	{
        $response = $this->client->email()->send([
        	'from' => 'UTel',
            'message' => 'Testing...'
        ]);

        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('error',$response['status']);
	}

	public function testSingleEmailSending()
	{
		$response = $this->client->email()->send([
			'from' => 'UTel NOMC',
			'to' => 'obua.emmanuel@utcl.co.ug',
			'cc' => 'obuaemmanuel10@gmail.com',
			'subject' => 'NOMC Site Login'
			'message' => 'Testing Email...'
		]);
		
		$this->assertEquals('"Message Sent."', $response['data']);
	}
}