<?php

namespace App\Services\Payment\Providers;

interface PaymentProviderInterface
{
    public function charge(string $token, $amount, $name, $currency);

    public function getTransactionId();
}
