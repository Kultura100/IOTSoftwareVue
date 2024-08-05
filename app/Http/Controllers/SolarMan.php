<?php


use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SolarManService
{
    protected $client;
    protected $appId;
    protected $appSecret;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.solarman.com/']);
        $this->appId = config('solarman.app_id');
        $this->appSecret = config('solarman.app_secret');
        $this->accessToken = config('solarman.access_token');
    }

    public function getData($endpoint, $params = [])
    {
        try {
            $response = $this->client->request('GET', $endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->accessToken,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'query' => $params,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('Error fetching data from SolarMan API: ' . $e->getMessage());
            return null;
        }
    }
}
