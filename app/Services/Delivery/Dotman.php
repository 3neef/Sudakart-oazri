<?php

namespace App\Services\Delivery;

use Illuminate\Support\Facades\Http;

class Dotman {
	const BASE_URL = 'https://hood.dotoman.net/api';
	protected $api_key;
	protected $base_url;
	public function __construct($api_key)
	{
		$this->api_key = $api_key;
		$this->base_url = self::BASE_URL;
	}
	public function createOrder($data) {
		// dd($data);
		return Http::baseUrl($this->base_url)
		->withHeaders([
			'key' => $this->api_key
		])->post("create?key=$this->api_key", $data)->json();

	}
	public function retrieveOrder($ref_id) {
		return Http::baseUrl($this->base_url)
		->withHeaders([
			'key' => $this->api_key
		])->post("status?key=$this->api_key", [
			"ref" => $ref_id
		])->json();
	}

	public function cancelOrder($ref_id) {
        return Http::baseUrl($this->base_url)
        ->withHeaders([
            'key' => $this->api_key
        ])->post("cancel?key=$this->api_key", [
            "ref" => $ref_id
        ])->json();
    }
}