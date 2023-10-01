<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function successResponse($data = null, $message = null)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'timestamp' => now()->format('Y-m-d H:i:s')
        ]);
    }

    public function errorResponse($errors = null, $message = 'Bad Request :(', $status = 400, $exception = false)
    {
        $message = ($exception && config('app.env') == 'production') ? 'Something went error...' : $message;
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
            'timestamp' => now()->format('Y-m-d H:i:s')
        ], $status);
    }
}
