<?php
namespace UTel\SDK;

class SMS extends Service
{

	public function __construct($client)
	{
		parent::__construct($client);
	}

	public function send($options)
	{

		if (empty($options['sender']) || empty($options['to']) || empty($options['message'])) {
			return $this->error('recipient and message must be defined');
		}

		if (!is_array($options['to'])) {
			$options['to'] = [$options['to']];
		}

		$data = [
			'sender' 	=> $options['sender'],
			'to' 		=> $options['to'],
			'message' 	=> $options['message']
		];

		$response = $this->client->request('POST', '/', [
		    'json' => [
				'sender' 	=> $options['sender'],
				'to' 		=> $options['to'],
				'message' 	=> $options['message']
			]
		]);

		return $this->success($response);
	}

}