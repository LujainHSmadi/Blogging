<?php

namespace App\Exceptions;

use Throwable;
use PDOException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Exception;



class Handler extends ExceptionHandler
{
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
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // Handle database connection exceptions
        if ($exception instanceof QueryException) {
            return response()->view('errors.database', [], 500);
        }

        // Other exception handling logic...

        return parent::render($request, $exception);
    }


}
