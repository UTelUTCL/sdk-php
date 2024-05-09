<?php

namespace UTel\SDK;

use GuzzleHttp\Client;

class UTel
{

	protected $token;
	protected $client;
	protected $baseDomain;

	/* Service can be email or sms */
	public function __construct($service = 'email', $baseDomain, $token = '')
	{
		$this->baseDomain = $baseDomain;
		$this->token = $token;

		$headers = [
		    'Content-Type' => 'application/json',
		];

		if ($service === 'sms') {
		    $headers['Authorization'] = 'Basic '.$this->token;
		} else {
		    $headers['Accept'] = 'application/json';
		}

		$this->client = new Client([
		    'base_uri' => $this->baseDomain,
		    'headers' => $headers,
		    'verify' => false,
		]);
	}

	public function sms()
	{
		return new SMS($this->client);
	}

	public function email()
	{
		$content = new Content($this->contentClient, $this->username, $this->apiKey);
		return $content;
	}
	
}