<?php

namespace App\Http\Controllers;

use App\Manifest;
use App\Car;
use App\Driver;
use App\Route;
use App\Customer;
use Illuminate\Http\Request;
use App\Imports\ManifestsImport;
use Excel;
use DB;

class ManifestController extends Controller
{
    public $income;
    public $cost;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', [
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required']
        ]);

        Excel::import(new ManifestsImport, request()->file('remesas'));

        return view('welcome', [
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }

    public function vehicle(Request $request)
    {
        //
        $findCar = Car::where('license_plate', 'LIKE', $request->input('license_plate'))
                        ->first();

        if(!$findCar) {

            dd('No existe un vehículo con esta plata');
        }

        // SELECT SUM(`income`), SUM(`cost`) FROM `manifests` WHERE `car_id` = 10
        $findManifest = DB::table('manifests')
                ->select(DB::raw('SUM(income) as income'), DB::raw('SUM(cost) as cost'))
                ->where('car_id', '=', $findCar->id)
                ->first();

        $this->income = $findManifest->income;

        return view('welcome', [
            'header' => 'Busqueda placa vehículo ' . $request->input('license_plate'),
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }

    public function driver(Request $request)
    {
        //
        $findDriver = Driver::where('identification', '=', $request->input('identification'))
                        ->first();

        if(!$findDriver) {

            dd('No existe un conductor con esta cédula');
        }

        // SELECT SUM(`income`), SUM(`cost`) FROM `manifests` WHERE `driver_id` = 10
        $findManifest = DB::table('manifests')
                ->select(DB::raw('SUM(income) as income'), DB::raw('SUM(cost) as cost'))
                ->where('driver_id', '=', $findDriver->id)
                ->first();

        $this->income = $findManifest->income;
        $this->cost = $findManifest->cost;

        return view('welcome', [
            'header' => 'Busqueda cédula conductor # ' . $request->input('identification'),
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }

    public function route(Request $request)
    {
        //
        $findRoute = Route::find($request->input('route_id'));

        if(!$findRoute) {

            dd('No existe una ruta con este id');
        }

        // SELECT SUM(`income`), SUM(`cost`) FROM `manifests` WHERE `route_id` = 10
        $findManifest = DB::table('manifests')
                ->select(DB::raw('SUM(income) as income'), DB::raw('SUM(cost) as cost'))
                ->where('route_id', '=', $findRoute->id)
                ->first();

        $this->income = $findManifest->income;

        return view('welcome', [
            'header' => 'Busqueda ruta ' . $request->input('route_id'),
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }

    public function customer(Request $request)
    {
        //
        $findCustomer = Customer::where('identification', '=', $request->input('identification'))
                        ->first();

        if(!$findCustomer) {

            dd('No existe un cliente con este NIT');
        }

        // SELECT SUM(`income`), SUM(`cost`) FROM `manifests` WHERE `customer_id` = 10
        $findManifest = DB::table('manifests')
                ->select(DB::raw('SUM(income) as income'), DB::raw('SUM(cost) as cost'))
                ->where('customer_id', '=', $findCustomer->id)
                ->first();

        $this->income = $findManifest->income;

        return view('welcome', [
            'header' => 'Busqueda NIT cliente # ' . $request->input('identification'),
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }

    public function empty ()
    {
        Manifest::query()->truncate();

        return view('welcome', [
            'income' => $this->income,
            'cost' => $this->cost
        ]);
    }
}
