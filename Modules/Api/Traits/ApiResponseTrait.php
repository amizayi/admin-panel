<?php

namespace Modules\Api\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

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
            'data'    => $data
        ], $status);
    }

    /**
     * Send an error response with the provided error message, optional error messages, and status code.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $status
     * @return JsonResponse
     */
    public function errorResponse(string $error, array $errorMessages = [], int $status = Response::HTTP_NOT_FOUND): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $error,
            'errors'  => is_array($errorMessages) ? $errorMessages : null
        ], $status);
    }


    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new ValidationException(
            $validator,
            $this->failedValidationResponse($validator->errors())
        );
    }


    /**
     * Send the response after a failed validation attempt.
     *
     * @param $errors
     * @return JsonResponse
     */
    protected function failedValidationResponse($errors): JsonResponse
    {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors'  => $errors,
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}
