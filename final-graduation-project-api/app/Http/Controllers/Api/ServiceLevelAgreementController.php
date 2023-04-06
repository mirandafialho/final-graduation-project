<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceLevelAgreement;
use Illuminate\Http\Request;

class ServiceLevelAgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceLevelAgreement::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceLevelAgreement  $serviceLevelAgreement
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceLevelAgreement $serviceLevelAgreement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceLevelAgreement  $serviceLevelAgreement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceLevelAgreement $serviceLevelAgreement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceLevelAgreement  $serviceLevelAgreement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceLevelAgreement $serviceLevelAgreement)
    {
        //
    }
}
