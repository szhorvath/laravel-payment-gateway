<?php

namespace App\Services\Payment\Facades;

use App\Services\Payment\Payment as PaymentClass;

class Payment extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return PaymentClass::class;
    }
}
