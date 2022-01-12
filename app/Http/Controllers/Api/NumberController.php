<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NumberRequest;
use App\Http\Resources\NumberResource;

use App\Http\Services\NumberService;

use Illuminate\Http\Request;


class NumberController extends Controller
{

    public function __construct()
    {
        $this->middleware(['customer.user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCustomer)
    {
        return NumberResource::collection(NumberService::all($idCustomer));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idCustomer, NumberRequest $request)
    {

        return new NumberResource(NumberService::store($idCustomer, $request->validated()));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show($idCustomer, $idNumber)
    {
        return new NumberResource(NumberService::get($idCustomer, $idNumber));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(NumberRequest $request, $idCustomer, $idNumber)
    {
        return new NumberResource(NumberService::update($idCustomer, $idNumber, $request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCustomer, $idNumber)
    {
        return NumberService::delete($idCustomer, $idNumber);
    }
}
