<?php

// ------------------------------------------------------------
// Error Handlers
// ------------------------------------------------------------

App::error(function(Exception $exception, $code)
{
  Log::error($exception);
});

// General HttpException handler
App::error(function(Symfony\Component\HttpKernel\Exception\HttpException $e, $code)
{
  $headers = $e->getHeaders();

  switch ($code)
  {
     case 404:
      $message = 'The requested resource was not found';
      break;

    default:
      $message = 'An error was encountered';
  }

  return Response::json($e->getMessage() ?: $message, $code, $headers);
});

// Redefine ModelNotFoundException Exception
App::error(function(Illuminate\Database\Eloquent\ModelNotFoundException $e)
{
  return Response::json($e->getMessage(), 404);
});