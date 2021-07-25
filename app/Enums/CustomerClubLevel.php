<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The CustomerClubLevel enum.
 *
 * @method static self FREE()
 * @method static self MONTHLY()
 * @method static self YEARLY()
 */
class CustomerClubLevel extends Enum
{
    const GOLDEN_LEVEL='golden_level' ;
    const SILVER_LEVEL='silver_level' ;
    const BRONZE_LEVEL='bronze_level' ;
    const NORMAL_LEVEL='normal_level' ;
    const LEVEL=[self::GOLDEN_LEVEL,self::SILVER_LEVEL,self::BRONZE_LEVEL,self::NORMAL_LEVEL];

}
