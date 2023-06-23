<?php

namespace Modules\Api\Traits;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Exception;
use Throwable;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;


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
    public function errorResponse( array|string $errors,string $errorMessages = '', int $status = Response::HTTP_NOT_FOUND): JsonResponse
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
     * @return JsonResponse
     */
    protected function processParseError($getMessage, Exception|Throwable $exception): JsonResponse
    {
        $detail = [
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'code' => $exception->getCode()
        ];

        // Log the error message and stack trace
        if(env('APP_DEBUG'))
            logger()->error("⚠️ $getMessage", $detail);

        // Return a JSON response
        return response()->json([
            'status'  => false,
            'message' => $getMessage,
            'errors'  => $detail
        ], Response::HTTP_BAD_REQUEST);
    }


//    /**
//     * Handle a failed validation attempt.
//     *
//     * @param Validator $validator
//     * @return void
//     *
//     * @throws ValidationException
//     */
//    protected function failedValidation(Validator $validator): void
//    {
//        throw new ValidationException(
//            $validator,
//            $this->failedValidationResponse((array)$validator->errors())
//        );
//    }


//    /**
//     * Send the response after a failed validation attempt.
//     *
//     * @param array $errors
//     * @return JsonResponse
//     */
//    protected function failedValidationResponse(array $errors): JsonResponse
//    {
//        return response()->json([
//            'status'  => false,
//            'message' => 'The given data was invalid.',
//            'errors'  => $errors,
//        ], Response::HTTP_UNPROCESSABLE_ENTITY);
//    }

}
