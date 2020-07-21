<?php

namespace App\Imports;

use App\Manifest;
use App\Driver;
use App\Car;
use App\Customer;
use App\Route;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ManifestsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            if ($row['estado'] == 'DESPACHADO')
            {
                // Set driver
                $findDriver = Driver::where('identification', '=', $row['conductor_documento'])
                ->first();

                if(!$findDriver) {

                    $findDriver = Driver::create([
                        'name' => $row['conductor'],
                        'identification' => $row['conductor_documento'],
                        'created_at' => date('Y-m-d H:m:s'),
                        'updated_at' => date('Y-m-d H:m:s'),
                    ]);
                }

                // setCar
                $findCar = Car::where('license_plate', 'LIKE', $row['placa'])
                        ->first();

                if(!$findCar) {

                    $findCar = Car::create([
                        'license_plate' => $row['placa'],
                    ]);
                }

                // setCustomer
                $findCustomer = Customer::where('identification', '=', $row['nitcliente'])
                        ->first();

                if(!$findCustomer) {

                    $findCustomer = Customer::create([
                        'name' => $row['cliente'],
                        'identification' => $row['nitcliente'],
                    ]);
                }

                // setRoute
                $findRoute = Route::where([
                    ['origin', 'LIKE', strtolower($row['origen'])],
                    ['final', 'LIKE', strtolower($row['destino'])],
                    ])->first();

                if(!$findRoute) {

                    $findRoute = Route::create([
                        'origin' => $row['origen'],
                        'final' => $row['destino'],
                    ]);
                }

                //setManifest
                $findManifest = Manifest::where([
                    ['manifest_id', '=', $row['manifiesto']],
                    ['route_id', '=', $findRoute->id],
                    ])->first();

                if(!$findManifest) {

                    Manifest::create([
                        'manifest_id' => $row['manifiesto'],
                        'income' => $row['total'],
                        'cost' => ($row['flete_valorcomision'] === null ? 0 : $row['flete_valorcomision']),
                        'car_id' => $findCar->id,
                        'driver_id' => $findDriver->id,
                        'customer_id' => $findCustomer->id,
                        'route_id' => $findRoute->id,
                    ]);
                }
            }
        }
    }
}
