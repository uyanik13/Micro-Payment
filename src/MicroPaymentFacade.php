<?php

namespace DRO\MicroPayment;

use Illuminate\Support\Facades\Facade;

/**
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 DRO http://www.dijitalreklam.org
 * @author     Ogur UYANIK
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class MicroPaymentFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'micro-payment';
    }
}
