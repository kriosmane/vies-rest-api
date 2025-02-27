<?php

namespace Kriosmane\ViesApi;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * Class Client
 *
 * This class handles communication with the VIES (VAT Information Exchange System) API
 * to validate VAT numbers within the European Union.
 */
class Client
{
    /**
     * The base URL for the VIES API.
     *
     * @var string
     */
    protected $base_url = 'https://ec.europa.eu/taxation_customs/vies/rest-api/ms';

    /**
     * The country code to be used in API requests.
     *
     * @var string
     */
    protected $country = '';

    /**
     * Configuration settings for the client.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Constructor method that initializes the client with the provided configuration.
     *
     * @param  array  $config  Optional configuration settings.
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Checks the validity of a VAT number using the VIES API.
     *
     * @param  string  $country  The country code (e.g., "DE" for Germany, "FR" for France).
     * @param  string  $vat      The VAT number to validate.
     * @return array|null        The response from the VIES API if successful, otherwise null.
     */
    public function check(string $country, string $vat)
    {
        $url = $this->base_url . '/' . Str::upper($country) . '/vat/' . $vat;

        try {
            // Make a GET request to the VIES API with a timeout setting.
            $response = Http::timeout($this->config['timeout'] ?? 5)->get($url);

            if ($response->successful()) {
                return $response->json();
            } else {
                return null;
            }
        } catch (\Exception $e) {
            // Log the error details if the request fails.
            Log::error('ViesApi request failed', [
                'error' => $e->getMessage(),
                'vat' => $vat,
                'country' => $country
            ]);

            return null;
        }
    }
}
