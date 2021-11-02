<?php


namespace App\Services\Provider;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

/**
 * Class UserProvider
 * @package Modules\Auth\Services\Provider
 */
class BankProvider
{
    public function getACredit()
    {
        $url = "https://hediehsara.ir/api/banks/B/balance";
        return $this->HttpGet($url);
    }

    public function getBCredit()
    {
        $url = "https://hediehsara.ir/api/banks/B/balance";
        return $this->HttpGet($url);
    }

    public function getCredit()
    {
        $bankA = $this->getACredit();
        $bankB = $this->getBCredit();
        return $bankA->json()['total'] + $bankB->json()['total'];

    }

    /**
     * @param string $url
     * @return \Illuminate\Http\Client\Response
     */
    private function HttpGet(string $url): \Illuminate\Http\Client\Response
    {
        $response = Http::get($url);
        return $response;
    }
}

