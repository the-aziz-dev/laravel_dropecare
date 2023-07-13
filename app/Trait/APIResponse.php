<?php

namespace App\Trait;

use Illuminate\Http\JsonResponse;

trait APIResponse
{
    protected static function successResponse(int $statusCode, $data): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'message' => 'successful',
            'results' => $data,
        ], $statusCode);
    }

    protected static function failResponse(int $statusCode, string $message): JsonResponse
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }
}
