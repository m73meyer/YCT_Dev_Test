<?php

namespace App\Http\Services;

use App\Models\Number;
use App\Models\NumberPreference;

class NumberPreferenceService {

    public static function all($idCustomer, $idNumber) {
        
        return NumberPreference::whereHas('number', function($q) use ($idCustomer, $idNumber) {
            $q->where('number_id', '=', $idNumber)->where('customer_id', $idCustomer);
        })->get();

    }

    public static function get($idCustomer, $idNumber, $idPreference) {

        return NumberPreference::where('id', $idPreference)
        ->whereHas('number', function($q) use ($idCustomer, $idNumber) {
            $q->where('number_id', '=', $idNumber)->where('customer_id', $idCustomer);
        })->first();

    }

    public static function delete($idCustomer, $idNumber, $idPreference)
    {

        $preference = NumberPreferenceService::get($idCustomer, $idNumber, $idPreference);
        return $preference->delete();

    }

    public static function store($idCustomer, $idNumber, $data)
    {

        return NumberPreference::create(array_merge(['customer_id' => $idCustomer, 'number_id' => $idNumber], $data));

    }

    public static function update($idCustomer, $idNumber, $idPreference, $data)
    {

        $preference = NumberPreferenceService::get($idCustomer, $idNumber, $idPreference);
        $preference->update($data);
        return $preference;

    }

}
