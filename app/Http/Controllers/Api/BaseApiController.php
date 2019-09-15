<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    /**
     * Transform data respond
     *
     * @param array $data
     * @param int $statusCode
     * @param string $message
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $statusCode, $message = null, $headers = [])
    {
        $data['success'] = [
            'message' => $message,
        ];

        return response()->json($data, $statusCode, $headers);
    }
}
