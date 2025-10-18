<?php

namespace App\Helper;

trait ResponseTrait
{
    public function successResponse($data = [], string $message = 'Success', int $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public function errorResponse(string $message = 'Error', int $code = 400, $errors = [])
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }

    public function validationError($errors, string $message = 'Validation failed')
    {
        return $this->errorResponse($message, 422, $errors);
    }

    public function unauthorizedError(string $message = 'Unauthorized')
    {
        return $this->errorResponse($message, 401);
    }

    public function notFoundError(string $message = 'Resource not found')
    {
        return $this->errorResponse($message, 404);
    }

    public function serverError(string $message = 'Internal server error')
    {
        return $this->errorResponse($message, 500);
    }
}
