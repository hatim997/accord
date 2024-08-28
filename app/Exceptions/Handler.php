<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;

use Throwable;

class Handler extends ExceptionHandler
{
  /**
   * The list of the inputs that are never flashed to the session on validation exceptions.
   *
   * @var array<int, string>
   */
  protected $dontFlash = ['current_password', 'password', 'password_confirmation'];

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
    // if ($exception instanceof QueryException) {
    //   // Database exception occurred, redirect to custom error page
    //   return response()->view('content.pages.pages-misc-error', [], 500);
    // }

    return parent::render($request, $exception);
  }
}
