<?php

namespace App\Http\Services;

use App\Models\Number;
use App\Models\Customer;

class NumberService {

    public static function all($idCustomer) {

        return Number::where('customer_id', '=', $idCustomer)->get();

    }

    public static function delete($idCustomer, $idNumber)
    {
        $number = NumberService::get($idCustomer, $idNumber);
        return $number->delete();
    }

    public static function get($idCustomer, $idNumber) {

        return Number::where('id', $idNumber)->where('customer_id', $idCustomer)->first();

    }

    public static function store($idCustomer, $data)
    {
        return Number::create(array_merge(['customer_id' => $idCustomer], $data));
    }

    public static function update($idCustomer, $idNumber, $data)
    {
        $number = NumberService::get($idCustomer, $idNumber);
        $number->update($data);
        return $number;
    }

}
