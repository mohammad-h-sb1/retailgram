<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The GenderType enum.
 *
 * @method static self FREE()
 * @method static self MONTHLY()
 * @method static self YEARLY()
 */
class GenderType extends Enum
{
    const GENDER_MAN='gender_mane';
    const GENDER_WOMAN='gender_woman';
    const GENDER=[self::GENDER_WOMAN,self::GENDER_MAN];


}
