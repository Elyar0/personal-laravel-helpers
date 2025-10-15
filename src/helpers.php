<?php

use Elyar\LaravelHelpers\Services\ApiResponse;
use Symfony\Component\HttpFoundation\Response;

if (!function_exists('apiResponse')) {
    function apiResponse(): ApiResponse
    {
        return app(ApiResponse::class);
    }
}

if (!function_exists('nextInArray')) {
    function nextInArray(array $array, mixed $current)
    {
        if (is_null($current)) return $array[0] ?? null;

        $index = array_search($current, $array);
        if ($index === false || empty($array)) {
            return null;
        }

        $nextIndex = ($index + 1) % count($array);
        return $array[$nextIndex];
    }
}

if (!function_exists('prevInArray')) {
    function prevInArray(array $array, mixed $current)
    {
        if (is_null($current)) return $array[count($array) - 1] ?? null;

        $index = array_search($current, $array);
        if ($index === false || empty($array)) {
            return null;
        }

        $prevIndex = ($index - 1 + count($array)) % count($array);
        return $array[$prevIndex];
    }
}

if (!function_exists('getHttpCodeDetails')) {
    function getHttpCodeDetails(int $httpCode): string
    {
        return strtolower(str_replace(' ', '_', Response::$statusTexts[$httpCode]));
    }
}
