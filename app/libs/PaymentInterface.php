<?php

namespace App\libs;

interface PaymentInterface
{
    public  static  function request($callback, $price);
    public  static  function response();
}
