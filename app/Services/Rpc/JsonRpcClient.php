<?php

namespace App\Services\Rpc;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Cache;

class JsonRpcClient
{
    public const JSON_RPC_VERSION = '2.0';   

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',               
            ],
            'base_uri' => config('services.activity.base_uri')
        ]);

        $this->login();   
    }

    /**
     *
     * @return array
     */
    public function send(string $module, string $method, array $params): array
    {
        $response = $this->client
            ->post($module, [
                RequestOptions::JSON => [
                    'jsonrpc' => self::JSON_RPC_VERSION,
                    'id' => time(),
                    'method' => $method,
                    'params' => $params
                ],                
                'headers' => [
                    'Authorization' => 'Bearer ' . Cache::get('activity_access_token')
                ],                
            ])->getBody()->getContents();
                
        return json_decode($response, true);        
    }

    /**
     *
     * @return void
     */
    private function login(): void
    {
        if (!Cache::get('activity_access_token')) {            
            $response = $this->client
            ->post('auth/login', [
                'form_params' => [
                    'email' => config('services.activity.login'),
                   'password' => config('services.activity.pass'),
                ]
            ])->getBody()->getContents();

            $result = json_decode($response, true);
            $token = $result['access_token'];
            $expires = $result['expires_in'];

            Cache::put('activity_access_token', $token, $expires);  
        }
    }
}
