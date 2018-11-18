<?php

namespace App\Services\Payment\Providers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Services\Payment\Providers\PaymentProviderInterface;

class StripeProvider implements PaymentProviderInterface
{
    protected $transactionId;

    public function __construct()
    {
        Stripe::setApiKey(config('stripe.secret_key'));
    }

    public function charge($token, $amount, $email, $currency)
    {
        try {
            $charge =  Charge::create([
                'amount' => $this->formatAmount($amount),
                'currency' => $currency,
                'receipt_email' => $email,
                'source' => $token,
            ]);
            $this->transactionId = $charge->id;
        } catch (\Exception $e) {
            $this->transactionId = null;
        }

        return $this;
    }


    public function formatAmount($amount)
    {
        return (int) str_replace(".", "", $amount);
    }

    public function getTransactionId()
    {
        return $this->transactionId;
    }
}
