<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\MakePaymentPost;
use App\Services\Payment\Facades\Payment;
use App\Order;

class PaymentController extends Controller
{
    public function index(MakePaymentPost $request)
    {
        if ($request->selected === 'card') {
            if (!$transactionId = $this->makeCardPayment($request)) {
                return [
                    'success' => false,
                    'message' => 'The transaction was unsuccessful',
                ];
            };
            $provider = 'stride';
        } else {
            $transactionId = $request->token;
            $provider = $request->selected;
        }

        //Create payment transaction record
        $transaction = new Transaction;
        $transaction->transaction_id = $transactionId;
        $transaction->provider       = $provider;
        $transaction->type           = $request->selected;
        $transaction->currency       = 'gbp';
        $transaction->amount         = $this->totalAmount($request);

        if (!$transaction->save()) {
            return [
                'success' => false,
                'We could place your order',
            ];
        }

        //Create orders
        foreach ($request->cart as $key => $product) {
            $order = new Order;
            $order->product_id     = $product['id'];
            $order->transaction_id = $transaction->id;
            $order->email          = $request->email;
            $order->quantity       = $product['qty'];
            $order->price          = $product['price'];
            $order->discount       = $product['discount'];
            $order->currency       = $product['currency'];
            $order->save();
        }

        return [
            'success' => true,
            'message' => 'your order is placed',
        ];
    }

    protected function makeCardPayment($request)
    {
        $response = Payment::make(
            $request->token,
            $this->totalAmount($request),
            $request->email
        );

        return $response->transactionId();
    }

    protected function totalAmount($request)
    {
        $amount = 0;
        foreach ($request->cart as $key => $product) {
            $amount += ((float) $product['price'] - (float) $product['discount']) * $product['qty'];
        }
        return $amount;
    }
}
