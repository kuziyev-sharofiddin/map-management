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
        $this->baseUrl = config('services.api.base_url', env('DOTNET_API_BASE_URL'));
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
        try {
            return $this->client()->get($endpoint, $query);
        } catch (\Exception $e) {
            throw new \Exception("Backend xizmati bilan aloqa o'rnatib bo'lmadi. Iltimos, tizim administratoriga murojaat qiling yoki keyinroq qayta urinib ko'ring.");
        }
    }

    /**
     * POST so'rov yuborish
     */
    public function post(string $endpoint, array $data = [])
    {
        try {
            return $this->client()->post($endpoint, $data);
        } catch (\Exception $e) {
            throw new \Exception("Backend xizmati bilan aloqa o'rnatib bo'lmadi. Iltimos, tizim administratoriga murojaat qiling yoki keyinroq qayta urinib ko'ring.");
        }
    }
}
