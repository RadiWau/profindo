<?php
namespace App\Exceptions;


use App\Controller\ResponseAPIController;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionsHandler;
use Illuminate\Validation\ValidationException;
// use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionsHandler
{

    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        // return parent::render($request, $exception);
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->view('errors.500');
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404');
        }

        if ($exception instanceof AuthenticationException) {
            return $request->expectsJson()
            ? response()->json([
                    'status'            => false,
                    'code'              => '01',
                    'message'           => $exception->getMessage(),
                ], 401)
            : redirect()->to('login');
        }

        if ($exception instanceof HttpException) {
            return response()->view('errors/ControllerNotFound');
        }

        if (config('app.debug')) {
            return parent::render($request, $exception);
        }

        return response()->view('errors/ControllerNotFound');
    }


}
