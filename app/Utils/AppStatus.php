<?php

namespace App\Utils;

class AppStatus
{
    public static function getCustomerStatus() {
        return ['new', 'active', 'suspended', 'cancelled'];
    }

    public static function getNumberStatus() {
        return ['active', 'inactive', 'cancelled'];
    }

}
