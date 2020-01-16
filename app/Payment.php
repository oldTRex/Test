<?php

namespace App;

use App\libs\PaymentInterface;
use Illuminate\Database\Eloquent\Model;
use Shetabit\Payment\Abstracts\Driver;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Shetabit\Payment\{Contracts\ReceiptInterface, Invoice, Receipt};
use Zarinpal\Laravel\Facade\Zarinpal;

class Payment extends Model
{
    public $invoice;

    const gates = [
        'pasargad', 'parsian'
    ];

    public function setOrder($uuid, $name, $description)
    {
        /*  $invoice = new Invoice();
          $invoice->amount(1000);
          $invoice->uuid($uuid);
          $invoice->detail([
              'name1' => $name,
              'detailName' => $description
          ]);
          $this->invoice = $invoice;*/
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public static function request($amount, $description, $email = null, $phone = "", $callback = null, $via = null)
    {
        $results = Zarinpal::request(
            url('bank/response'),          //required
            $amount,                                  //required
            (string)$description,                             //required
            (string)$email,                      //optional
            (string)$phone,                         //optional
            [                          //optional
                "Wages" => [
                    "zp.1.1" => [
                        "Amount" => 120,
                        "Description" => "part 1"
                    ],
                    "zp.2.5" => [
                        "Amount" => 60,
                        "Description" => "part 2"
                    ]
                ]
            ]
        );


        Zarinpal::redirect();
    }

    public static function response($Authority, $Status)
    {

    }
}
