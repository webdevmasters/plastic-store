<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatus extends Enum {

    const CANCELED = 0;
    const ORDERED = 1;
    const IN_PREPARATION = 2;
    const SENT = 3;
    const DELIVERED = 4;
}
