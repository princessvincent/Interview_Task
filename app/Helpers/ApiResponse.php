<?php

namespace App\Helpers;

use App\Enums\ApiResponseEnum;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success(string $message = null, ?array $data = [], int $code = 200): JsonResponse
    {
        $var = [
            "success" => true,
            "status" => ApiResponseEnum::success->name,
            "message" => $message,
        ];

        return response()->json(array_merge($var, $data), $code);
    }

    public static function failed(string $message, int $code = 400, array $data = []): JsonResponse
    {
        $var = [
            'success' => false,
            'status' => ApiResponseEnum::failed->name,
            'message' => $message,
        ];

        return response()->json(array_merge($var, $data), $code);
    }
}
