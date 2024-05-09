<?php
namespace UTel\SDK\Tests;

use UTel\SDK\UTel;
use GuzzleHttp\Exception\GuzzleException;

#[\AllowDynamicProperties]
class EmailTest extends \PHPUnit\Framework\TestCase
{

	public function setUp(): void
	{
		$baseDomain = '';

		$this->client = new UTel($baseDomain);
	}

	public function testEmailWithEmptyMessage()
	{
        $response = $this->client->email()->send([
        	'from' => 'nomc_alerts@utcl.co.ug',
            'to' => 'obua.emmanuel@utcl.co.ug',
        ]);

        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('error',$response['status']);
	}

	public function testEmailWithEmptyRecipient()
	{
        $response = $this->client->email()->send([
        	'from' => 'nomc_alerts@utcl.co.ug',
            'message' => 'Testing...'
        ]);

        $this->assertArrayHasKey('status',$response);
        $this->assertEquals('error',$response['status']);
	}

	public function testSingleEmailSending()
	{
		$response = $this->client->email()->send([
			'from' => 'nomc_alerts@utcl.co.ug',
			'to' => 'obua.emmanuel@utcl.co.ug',
			'cc' => 'obuaemmanuel10@gmail.com',
			'subject' => 'NOMC Site Login',
			'message' => 'Testing Email...'
		]);
		
		$this->assertTrue(true);
	}
}