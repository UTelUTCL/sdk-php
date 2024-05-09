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
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'http://utlhq407:9191/api/sms/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
			"sender": "UTel",
			 "recipient": "716094006",
			 "message": "Test"
		}',
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
			'Authorization: Basic VmFzQXBwOlZhc0RldkAxMjM0'
		  ),
		));

		$response = curl_exec($curl);
		
		var_dump($response);

		curl_close($curl);

		$response = $this->client->request('POST', '/', [
		    'json' => [
				'sender' 	=> $options['sender'],
				'recipient' => $options['to'],
				'message' 	=> $options['message']
			]
		]);

		return $this->success($response);
	}

}