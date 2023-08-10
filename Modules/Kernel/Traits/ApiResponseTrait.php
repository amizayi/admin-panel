<?php

namespace Modules\Kernel\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;


trait ApiResponseTrait
{
    /**
     * Send a successful response with the provided data, message, and status code.
     *
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function successResponse(mixed $data, string $message = '', int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'result'  => $data
        ], $status);
    }

    /**
     * Send an error response with the provided error message, optional error messages, and status code.
     *
     * @param string $errorMessages
     * @param array|string $errors
     * @param int $status
     * @return JsonResponse
     */
    public function errorResponse( array|string $errors,string $errorMessages = '', int $status = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $errorMessages,
            'errors'  => $errors
        ], $status);
    }

    /**
     * Handle the given parse error exception.
     *
     * @param $getMessage
     * @param Exception|Throwable $exception
     * @param int $statusCode
     * @return JsonResponse
     */
    protected function processParseError($getMessage, Exception|Throwable $exception, int $statusCode = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        $detail = [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'code' => $exception->getCode()
        ];

        // Log the error message and stack trace
        if(env('APP_DEBUG'))
            logger()->error("[⚠️ $getMessage]", $detail);

        // Return a JSON response
        return response()->json([
            'status'  => false,
            'message' => $getMessage,
            'errors'  => $detail
        ], $statusCode);
    }
}
