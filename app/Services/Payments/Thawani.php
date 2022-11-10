<?php


namespace App\Services\Payments;

use Exception;
use Illuminate\Support\Facades\Http;

class Thawani {
	const TEST_BASE_URL = 'https://uatcheckout.thawani.om/api/v1';
	const LIVE_BASE_URL = 'https://checkout.thawani.om/api/v1';
	protected $secret_key;
	protected $publishable_key;
	protected $base_url;
	public function __construct($secret_key, $publishable_key, $mode = 'test')
	{
		$this->secret_key = $secret_key;
		$this->publishable_key = $publishable_key;
		if ($mode == 'test') {
			$this->base_url = self::TEST_BASE_URL;
		} else {
			$this->base_url = self::LIVE_BASE_URL;
		}
	}
	public function createCheckoutSession($data) 
	{
		$response = Http::baseUrl($this->base_url)->withHeaders([
			'thawani-api-key' => $this->secret_key
		])->asJson()->post('checkout/session', $data);
		$body = $response->json();
		if ($body['success'] == true && $body['code'] == '2004') {
			return $body['data']['session_id'];
		} else {
			throw new Exception($body['description'], $body['code']);
		}
	}
	public function getCheckoutSession($session_id) {
		$response = Http::baseUrl($this->base_url)
		->withHeaders([
			'thawani-api-key'  => $this->secret_key,
		])->get('checkout/session/'.$session_id)->json();
		if ($response['success'] == true && $response['code'] == 2000) {
			return $response;
		} else {
			throw new Exception($response['description'], $response['code']);
		}
	}
}