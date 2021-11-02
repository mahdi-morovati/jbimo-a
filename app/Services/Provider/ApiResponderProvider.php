<?php


namespace App\Services\Provider;


use Illuminate\Http\Response;

/**
 * Class UserProvider
 * @package Modules\Auth\Services\Provider
 */
class ApiResponderProvider
{
    protected int $statusCode;

    public function success(string $message)
    {
        $this->statusCode = Response::HTTP_OK;
        return $this->respond([
            'message' => $message
        ]);
    }

    public function created(string $message)
    {
        $this->statusCode = Response::HTTP_CREATED;
        return $this->respond([
            'message' => $message
        ]);
    }

    public function updated(string $message)
    {
        $this->statusCode = Response::HTTP_OK;
        return $this->respond([
            'message' => $message
        ]);
    }

    public function badRequest(string $message)
    {
        $this->statusCode = Response::HTTP_BAD_REQUEST;
        return $this->respond([
            'message' => $message
        ]);

    }

    public function destroyed(string $message)
    {
        $this->statusCode = Response::HTTP_OK;
        return $this->respond([
            'message' => $message
        ]);
    }

    public function notFound(string $message = 'Not Found!')
    {
        $this->statusCode = Response::HTTP_NOT_FOUND;
        return $this->respond([
            'message' => $message
        ]);
    }

    public function internalError(string $message)
    {
        $this->statusCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        return $this->respond([
            'message' => $message
        ]);

    }

    public function unauthorizedError(string $message)
    {
        $this->statusCode = Response::HTTP_UNAUTHORIZED;
        return $this->respond([
            'message' => $message,
        ]);
    }

    public function error(int $statusCode, string $message)
    {
        $this->statusCode = $statusCode;
        return $this->respond([
            'message' => $message,
        ]);
    }

    public function data($data, int $statusCode = 200)
    {
        $this->statusCode = $statusCode;
        return $this->respond([
            'data' => $data,
        ]);
    }


    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }


    public function respond($data)
    {
        return response()->json(
            $data, $this->getStatusCode()
        );
    }


}
