<?php
namespace UTel\SDK;

class SMS extends Service
{

	public function __construct($baseDomain, $token)
	{
		parent::__construct($baseDomain, $token);
	}

	public function send($options)
	{

		try {

			if (empty($options['sender']) || empty($options['to']) || empty($options['message'])) {
				return $this->error('recipient and message must be defined');
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
					"sender": "'.$options['sender'].'",
					"recipient": "'.$options['to'].'",
					"message": "'.$options['message'].'"
				}',
				CURLOPT_HTTPHEADER => array(
					'Content-Type: application/json',
					'Authorization: Basic '.$this->token
				),
			));

			$response = curl_exec($curl);
			
			curl_close($curl);
			
		} catch (\Exception $e) {
			return $this->error($e->getMessage());
		}

		return $this->success($response);
	}

}