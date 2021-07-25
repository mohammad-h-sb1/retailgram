<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The TagSizeType enum.
 *
 * @method static self FREE()
 * @method static self MONTHLY()
 * @method static self YEARLY()
 */
class TagSizeType extends Enum
{
    const XS='XS';
    const XXS='XXS';
    const S = 'S';
    const M = 'M';
    const L = 'L';
    const Xl = 'XL';
    const XXl = 'XXL';
    const XXXl = 'XXXL';
    const X4Xl = '4XL';
    const Size=[self::XS,self::XXS,self::S,self::M,self::L,self::Xl,self::XXl,self::XXXl,self::X4Xl];

}
