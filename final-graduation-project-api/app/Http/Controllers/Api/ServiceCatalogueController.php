<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceCatalogue;
use Illuminate\Http\Request;

class ServiceCatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceCatalogue::all();
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
     * @param  \App\Models\ServiceCatalogue  $serviceCatalogue
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCatalogue $serviceCatalogue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCatalogue  $serviceCatalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCatalogue $serviceCatalogue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCatalogue  $serviceCatalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCatalogue $serviceCatalogue)
    {
        //
    }
}
