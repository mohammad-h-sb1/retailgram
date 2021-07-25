<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The UserType enum.
 *
 * @method static self FREE()
 * @method static self MONTHLY()
 * @method static self YEARLY()
 */
class UserType extends Enum
{
    const TYPE_ADMIN='admin';
    const TYPE_MANAGER='manager';
    const TYPE_ADMIN_CENTER='admin_center';
    const TYPE_INFLUENSER='influenser';
    const TYPE_CUSTOMER='customer';
    const TYPE_STYLIST='stylist';
    const TYPE_USER='user';
    const TYPE_GUEST='guest';
    const TYPE_SHOP='shop';
    const TYPES=[self::TYPE_ADMIN,self::TYPE_MANAGER,self::TYPE_ADMIN_CENTER, self::TYPE_INFLUENSER,
        self::TYPE_STYLIST,self::TYPE_GUEST,self::TYPE_CUSTOMER,self::TYPE_USER,self::TYPE_SHOP];
}
