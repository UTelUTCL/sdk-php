<?php

namespace UTel\SDK;

use GuzzleHttp\Client;

class UTel
{

	protected $token;
	protected $baseDomain;

	/* Service can be email or sms */
	public function __construct($baseDomain, $token = '')
	{
		$this->baseDomain = $baseDomain;
		$this->token = $token;
	}

	public function sms()
	{
		return new SMS($this->baseDomain, $this->token);
	}

	public function email()
	{
		return new Email($this->baseDomain);
	}
	
}