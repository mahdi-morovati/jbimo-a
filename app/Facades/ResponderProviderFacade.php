<?php


namespace App\Facades;


/**
 * Class ResponderProviderFacade
 * @package App\Facades
 * @method success(string $message)
 * @method created(string $message)
 * @method updated(string $message)
 * @method badRequest(string $message)
 * @method deleted(string $message)
 * @method notFound(string $message)
 * @method internalError(string $message)
 * @method unauthorizedError(string $message)
 * @method error(int $statusCode, string $message)
 * @method data($data, int $statusCode = 200)
 */
class ResponderProviderFacade extends BaseFacade
{
    const key = 'responderProvider';
}
