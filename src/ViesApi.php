<?php

namespace Kriosmane\ViesApi;

use Kriosmane\ViesApi\Client;

/**
 * Class ViesApi
 *
 * This class provides an interface to interact with the VIES (VAT Information Exchange System) API
 * to validate VAT numbers within the European Union.
 */
class ViesApi
{
    /**
     * The configuration array for the package.
     *
     * @var array
     */
    protected $config = [];

    /**
     * The client instance used to make API requests.
     *
     * @var \Kriosmane\ViesApi\Client
     */
    protected $client;

    /**
     * Constructor method that initializes the class with the package configuration.
     *
     * @param  array  $config  Optional configuration array for the API client.
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
        
        // Initialize the client instance with the given configuration
        $this->client = new Client($this->config);
    }

    /**
     * Checks the validity of a VAT number using the VIES system.
     *
     * @param  string  $country  The country code (e.g., "DE" for Germany, "FR" for France).
     * @param  string  $vat      The VAT number to be validated.
     * @return array             The response from the VIES API, containing validation details.
     */
    public function checkVat(string $country, string $vat)
    {
        return $this->client->check($country, $vat);
    }
}
