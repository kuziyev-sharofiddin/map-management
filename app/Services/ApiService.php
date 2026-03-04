<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class ApiService
{
    private string $baseUrl;
    private int $timeout;

    public function __construct()
    {
        $this->baseUrl = config('services.api.base_url', env('DOTNET_API_BASE_URL', 'http://10.100.104.128:5084/api'));
        $this->timeout = config('services.api.timeout', env('DOTNET_API_TIMEOUT', 10));
    }

    /**
     * Umumiy Http client tayyorlash
     */
    public function client()
    {
        $client = Http::timeout($this->timeout)->baseUrl($this->baseUrl);

        $token = session('auth_token');
        if ($token) {
            $client->withToken($token);
        }

        return $client;
    }

    /**
     * GET so'rov yuborish
     */
    public function get(string $endpoint, array $query = [])
    {
        return $this->client()->get($endpoint, $query);
    }

    /**
     * POST so'rov yuborish
     */
    public function post(string $endpoint, array $data = [])
    {
        return $this->client()->post($endpoint, $data);
    }
}
