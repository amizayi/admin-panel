<?php

namespace Modules\Kernel\Exceptions\V1;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Kernel\Traits\ApiResponseTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * The exception classes that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        QueryException::class
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param  Exception|Throwable $e
     * @return JsonResponse
     */
    public function render($request, Exception|Throwable $e): JsonResponse
    {
        return match (true) {
            $e instanceof ValidationException     => $this->errorResponse(
                                                         $e->validator->getMessageBag()->toArray(),
                                                         $e->getMessage(),
                                                         Response::HTTP_UNPROCESSABLE_ENTITY
                                                     ),
            $e instanceof NotFoundHttpException   => $this->processParseError($e->getMessage(), $e, Response::HTTP_NOT_FOUND),
            $e instanceof AuthorizationException  => $this->processParseError($e->getMessage(), $e, Response::HTTP_FORBIDDEN),
            $e instanceof AuthenticationException => $this->processParseError($e->getMessage(), $e, Response::HTTP_UNAUTHORIZED),
            $e instanceof QueryException          => $this->processParseError($e->getMessage(), $e, Response::HTTP_BAD_REQUEST),

            default => $this->processParseError($e->getMessage(), $e),
        };
    }
}
