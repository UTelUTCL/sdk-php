<?php
namespace UTel\SDK;

abstract class Service 
{
	protected $client;

	public function __construct($client)
	{
		$this->client 	= $client;
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
			'data'		=> json_decode($data->getBody()->getContents())
		];
	}
}