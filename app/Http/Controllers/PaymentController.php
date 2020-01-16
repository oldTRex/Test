<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Payment\Invoice;
use Shetabit\Payment\Facade\Payment;
//use Zarinpal\Zarinpal;
use Zarinpal\Laravel\Facade\Zarinpal;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource    .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Payment $Payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $Payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Payment $Payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $Payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Payment $Payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $Payment)
    {

    }

    /**
     * test the specified resource from storage.
     *
     * @param \App\Payment $Payment
     * @return \Illuminate\Http\Response
     */
    public function testTransactionRequest()
    {
        /*     $invoice = (new Invoice())->amount(1000);
             Payment::callbackUrl(url('bank/response'))->purchase(
                 $invoice,
                 function($driver, $transactionId) {
                     // we can store $transactionId in database
                 }
             )->pay();*/

        // $zarinpal = new Zarinpal('7b2c6d10-8691-11e9-9041-000c29344814');
        //Zarinpal::enableSandbox(); // active sandbox mod for test env
        // $zarinpal->isZarinGate(); // active zarinGate mode
        app(\App\Payment::class)->request(10000, 'تست');
    }

    public function testTransactionResponse(Request $request)
    {

        if ($request->Status == "NOK")
            return 'false';
        else return 'true';
    }
}
