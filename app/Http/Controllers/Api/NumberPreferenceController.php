<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NumberPreferenceRequest;
use App\Http\Resources\NumberPreferenceResource;
use App\Models\NumberPreference;
use App\Http\Services\NumberPreferenceService;
use Illuminate\Http\Request;

class NumberPreferenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCustomer, $idNumber)
    {
        return new NumberPreferenceResource(NumberPreferenceService::all($idCustomer, $idNumber));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $idCustomer
     * @param  int  $idNumber
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idCustomer, $idNumber, NumberPreferenceRequest $request)
    {
        return new NumberPreferenceResource(NumberPreferenceService::store($idCustomer, $idNumber, $request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idCustomer
     * @param  int  $idNumber
     * @param  int  $id
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function show($idCustomer, $idNumber, $id)
    {
 
        return new NumberPreferenceResource(NumberPreferenceService::get($idCustomer, $idNumber, $id));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $idCustomer
     * @param  int  $idNumber
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function update(NumberPreferenceRequest $request, $idCustomer, $idNumber, $id)
    {

        return new NumberPreferenceResource(NumberPreferenceService::update($idCustomer, $idNumber, $id, $request->validated()));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idCustomer
     * @param  int  $idNumber
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCustomer, $idNumber, $id)
    {

        return NumberPreferenceService::delete($idCustomer, $idNumber, $id);

    }
}
