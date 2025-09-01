<?php

namespace Elyar\LaravelHelpers\services;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public function success(mixed $data = null, int $code = 200, array $extra = [], string $message = null): JsonResponse
    {
        $response = [
            'success' => true,
            'message' => $message ?? null,
            'data' => $data ?? [],
        ];

        if (isset($extra)) $response = array_merge($response, $extra);

        return response()->json($response, $code);
    }

    public function error(string $error, int $code = 400, ?string $errorType = null): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        empty($errorType) ?: $response['error_type'] = $errorType;

        return response()->json($response, $code);
    }

    public function errors(array $errors, int $code = 400, string $message = null): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message ?? null,
            'errors' => $errors,
        ];

        return response()->json($response, $code);
    }
}
