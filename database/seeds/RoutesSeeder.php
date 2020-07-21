<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 10; $i++) {
            \DB::table('routes')->insert(array(
                'origin' => $faker->randomElement(['cali','yumbo','buenaventura']),
                'final'  => $faker->randomElement(['medellin','buenaventura','villa rica', 'cali', 'yumbo']),
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ));
        }
    }
}
