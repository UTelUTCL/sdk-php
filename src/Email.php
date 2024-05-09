<?php
namespace UTel\SDK;

class Email extends Service
{

	public function __construct($baseDomain, $token)
	{
		parent::__construct($baseDomain, $token);
	}

	public function send($options)
	{

		if (empty($options['from']) || empty($options['to']) || empty($options['message']) || empty($options['subject'])) {
			return $this->error('recipient, subject and message must be defined');
		}
		
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $this->baseDomain,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
				"From": "'.$options['from'].'",
				"To": "'.$options['to'].'",
				"Cc": "'.$options['cc'].'",
				"Sub": "'.$options['subject'].'",
				"Msg": "'.$options['message'].'",
			}',
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json'
			),
		));

		$response = curl_exec($curl);
		
		curl_close($curl);

		return $this->success($response);
	}

}