<?php
namespace App\Services\Payment;

use App\Services\Payment\Providers\StripeProvider;
use App\Services\Payment\Providers\PaymentProviderInterface;

class Payment
{
    protected $provider;

    protected $transaction;

    public function __construct(PaymentProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function make($token, $amount, $email, $currency = 'gbp')
    {
        $this->transaction = $this->provider->charge($token, $amount, $email, $currency);

        return $this;
    }

    public function transactionId()
    {
        return $this->provider->getTransactionId();
    }
}
