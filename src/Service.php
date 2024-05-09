<?php
namespace UTel\SDK;

abstract class Service 
{
	protected $baseDomain;
	protected $token;

	public function __construct($baseDomain, $token = '')
	{
		$this->baseDomain 	= $baseDomain;
		$this->token 	= $token;
	}

	protected static function error($data) {
		return [
			'status' 	=> 'error',
			'data'		=> $data
		];
	}


	protected static function success($data) {
		return [
			'status' 	=> 'success',
			'data'		=> $data
		];
	}
}