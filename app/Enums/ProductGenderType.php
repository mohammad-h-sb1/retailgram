<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The ProductGenderType enum.
 *
 * @method static self FREE()
 * @method static self MONTHLY()
 * @method static self YEARLY()
 */
class ProductGenderType extends Enum
{
    const GENDER_MAN='man';
    const GENDER_WOMAN='woman';
    const GENDER = [self::GENDER_MAN,self::GENDER_WOMAN];
}
