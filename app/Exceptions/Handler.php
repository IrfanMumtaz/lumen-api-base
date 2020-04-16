<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Resources\ErrorResponse;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException as SpatieUnauthorizedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof BaseException) {
            $res = new ErrorResponse($e->getError());
            return response()->json($res, 200);
        } elseif ($e instanceof SpatieUnauthorizedException) {
            $res = new ErrorResponse(Error::$UNAUTHRIZED);
            return response()->json($res, 401);
        } elseif ($e instanceof NotFoundHttpException) {
            $res = new ErrorResponse(Error::$NOT_FOUND);
            return response()->json($res, 404);
        } elseif ($e instanceof MethodNotAllowedHttpException) {
            $res = new ErrorResponse(Error::$NOT_FOUND);
            return response()->json($res, 404);
        } elseif ($e instanceof ValidationException) {
            $error = array_first($e->response->original);
            $res = new ErrorResponse(Error::validationErrors($error[0]));
            return response()->json($res, 422);
        } elseif ($e instanceof HttpException) {

            $res = new ErrorResponse(Error::$INVALID_METHOD_REQUEST);
            return response()->json($e, 405);
        } else {
            $res = new ErrorResponse(Error::$INTERNAL_FAILURE);
            return response()->json($res, 500);
        }
        return parent::render($request, $e);
    }
}
