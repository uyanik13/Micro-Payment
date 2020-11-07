<?php

/**
 * @param string $accessKey
 * @param string $url
 *
 * @return string
 *
 * @see     https://www.micropayment.de/help/integration_web/#integration_web-parameters-sealing
 */
if (!function_exists('sealUrl')) {
    function sealUrl($accessKey, $url)
    {
        $matches = [];
        preg_match('/^(http(?:s?):\/\/[^?]*?\?)?\?*(.*?)(?:&?seal=([^&]*)(&?.*)?)?$/', $url, $matches);
        $matches = array_merge($matches, [1 => '', 2 => '', 3 => '', 4 => '']);

        return (string)$matches[1] . (string)$matches[2] . '&seal=' . md5(urldecode((string)$matches[2]) . (string)$accessKey) . (string)$matches[4];
    }

}


/**
 * @param string              $accessKey
 * @param string              $baseUrl
 * @param array<string,mixed> $securedParameters
 * @param array<string,mixed> $unsecuredParameters
 *
 * @return string
 */
if (!function_exists('generatePaymentWindowUrl')) {
    function generatePaymentWindowUrl($accessKey, $baseUrl, $securedParameters, $unsecuredParameters)
    {
        $unsealedUrl = rtrim($baseUrl, '?') . '?' . http_build_query($securedParameters, '', '&') . '&seal=&' . http_build_query($unsecuredParameters, '', '&');

        return rtrim(sealUrl($accessKey, $unsealedUrl), '&');
    }

}

if (!function_exists('test')) {
    function test($accessKey, $baseUrl, $securedParameters, $unsecuredParameters)
    {
        $unsealedUrl = rtrim($baseUrl, '?') . '?' . http_build_query($securedParameters, '', '&') . '&seal=&' . http_build_query($unsecuredParameters, '', '&');

        return rtrim(sealUrl($accessKey, $unsealedUrl), '&');
    }

}

