<?php

namespace Modules\Api\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * Send a successful response with the provided data, message, and status code.
     *
     * @param mixed $data The data to include in the response.
     * @param string $message An optional message to include in the response.
     * @param int $status The HTTP status code to use for the response.
     * @return JsonResponse     The JSON response object.
     */
    public function sendResponse(mixed $data, string $message = '', int $status = 200): JsonResponse
    {
        return response()->json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        ], $status);
    }

    /**
     * Send an error response with the provided error message, optional error messages, and status code.
     *
     * @param string $error The error message to include in the response.
     * @param array $errorMessages An optional array of additional error messages to include in the response.
     * @param int $status The HTTP status code to use for the response.
     * @return JsonResponse          The JSON response object.
     */
    public function sendError(string $error, array $errorMessages = [], int $status = 404): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $error,
            'errors'  => is_array($errorMessages) ? $errorMessages : null
        ], $status);
    }

}
