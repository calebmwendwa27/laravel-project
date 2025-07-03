<?php

namespace App\Services\ICD;

use Illuminate\Support\Facades\Http;

class ICD_API_Client
{
    const TOKEN_ENDPOINT = "https://icdaccessmanagement.who.int/connect/token";
    const CLIENT_ID = "5278f54f-57c5-43a8-9b61-df260487f36c_6f814d6f-cd03-40af-b73a-b819700e4b30";
    const CLIENT_SECRET = "tEKRaYfeWSlyIBMcRjcoEn1jWQSLiF3NwCogKKXJea4=";
    const SCOPE = "icdapi_access";
    const GRANT_TYPE = "client_credentials";

    private $token;
    private $uri;

    public function __construct($uri)
    {
        $this->uri = $uri;

        if (session()->has('icd_token')) {
            $this->token = session('icd_token');
        } else {
            $this->newToken();
        }
    }

    public function get()
    {
        $response = $this->makeRequest();

        // Handle token expiration
        if ($response->unauthorized()) {
            session()->forget('icd_token');
            $this->newToken();
            $response = $this->makeRequest();
        }

        return $response->successful() ? $response->json() : null;
    }

    private function makeRequest()
    {
        return Http::withToken($this->token)
            ->acceptJson()
            ->withHeaders([
                'Accept-Language' => 'en',
                'API-Version' => 'v2',
            ])
            ->get($this->uri);
    }

    private function newToken()
    {
        $response = Http::asForm()->post(self::TOKEN_ENDPOINT, [
            'client_id' => self::CLIENT_ID,
            'client_secret' => self::CLIENT_SECRET,
            'scope' => self::SCOPE,
            'grant_type' => self::GRANT_TYPE
        ]);

        $this->token = $response->json('access_token');
        session(['icd_token' => $this->token]);
    }
}
