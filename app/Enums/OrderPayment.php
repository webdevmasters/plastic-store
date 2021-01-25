<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 *
 */
final class OrderPayment extends Enum {

    const CASH_ON_DELIVERY = 0;
    const DIRECT_BANK_TRANSFER = 1;
    const CREDIT_CARD = 2;
}
