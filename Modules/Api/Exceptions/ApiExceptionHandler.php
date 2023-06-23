<?php

namespace Modules\Api\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Modules\Api\Traits\ApiResponseTrait;
use Throwable;

class ApiExceptionHandler extends ExceptionHandler
{
    use ApiResponseTrait;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Exception|Throwable $e
     * @return RedirectResponse|JsonResponse
     */
    public function render($request, Exception|Throwable $e): RedirectResponse|JsonResponse
    {
        if ($e instanceof ValidationException)
            return $this->errorResponse(
                $e->validator->getMessageBag()->toArray(),
                $e->getMessage(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );

        // Handle all other exceptions
        return $this->processParseError($e->getMessage(), $e);
    }
}
