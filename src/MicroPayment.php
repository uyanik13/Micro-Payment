<?php

namespace DRO\MicroPayment;

use Exception;
use Carbon\Carbon;


/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 DRO http://www.dijitalreklam.org
 * @author     Ogur UYANIK
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */

class MicroPayment
{

    public function __construct()
    {

    }


    public function paymentMethods ()
    {
        return  [
            'CreditCard'  => [
            'enabled'        => true,
            'url'            => 'https://creditcard.' . 'micropayment.de' . '/creditcard/event/',
            'resource-group' => 'cc',
            'resource-image' => 'type-o.1',
        ],
        // Direct debit - Event
        'DirectDebit' => [
            'enabled'        => true,
            'url'            => 'https://sepadirectdebit.' . 'micropayment.de'  . '/lastschrift/event/',
            'resource-group' => 'dbt',
            'resource-image' => 'type-o.1',
        ],
        // Online bank transfer. - Event
        'Sofort'      => [
            'enabled'        => true,
            'url'            => 'https://directbanking.' . 'micropayment.de'  . '/sofort/event/',
            'resource-group' => 'klarna-sofort',
            'resource-image' => 'type-o.1',
        ],
        // Bank transfer - Event
        'Prepayment'  => [
            'enabled'        => true,
            'url'            => 'https://prepayment.' . 'micropayment.de'  . '/prepay/event/',
            'resource-group' => 'pp',
            'resource-image' => 'type-o.1',
        ],
        // PayPal - Event
        'PayPal'      => [
            'enabled'        => true,
            'url'            => 'https://paypal.' . 'micropayment.de'  . '/paypal/event/',
            'resource-group' => 'ppl',
            'resource-image' => 'type-o.1',
        ],
        // Bank transfer - Event
        'paysafecard' => [
            'enabled'        => true,
            'url'            => 'https://paysafecard.' . 'micropayment.de'  . '/paysafecard/event/',
            'resource-group' => 'psc',
            'resource-image' => 'type-o.1',
        ],
        // Call2Pay - Event
        'Call2Pay'    => [
            'enabled'        => true,
            'url'            => 'https://call2pay.' . 'micropayment.de'  . '/call2pay/event/',
            'resource-group' => 'c2p',
            'resource-image' => 'type-o.1',
        ],
        // MobilePay - Event
        'HandyPay'    => [
            'enabled'        => false,
            'url'            => 'https://mobilepayment.' . 'micropayment.de'  . '/handypay/event/',
            'resource-group' => 'hp',
            'resource-image' => 'type-o.1',
        ],
     ];
    }
}
