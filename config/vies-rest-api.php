<?php

/**
 * Configuration file for VIES API integration.
 *
 * This file defines the timeout setting for API requests.
 */
return [
    /**
     * Timeout for VIES API requests in seconds.
     * This value can be set via the environment variable VIES_API_TIMEOUT.
     *
     * @var int
     */
    'timeout' => env('VIES_API_TIMEOUT', 5),
];
