<?php

use Elyar\LaravelHelpers\services\ApiResponse;

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