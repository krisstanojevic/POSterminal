<?php

use Illuminate\Database\Seeder;
use App\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        Country::create(array(
            'name'     => 'China',
            'pdv'    => '15',
        ));
        Country::create(array(
            'name'     => 'Canada',
            'pdv'    => '25',
        ));
        Country::create(array(
            'name'     => 'Serbia',
            'pdv'    => '20',
        ));
        Country::create(array(
            'name'     => 'Turkey',
            'pdv'    => '10',
        ));
        Country::create(array(
            'name'     => 'India',
            'pdv'    => '15',
        ));
        Country::create(array(
            'name'     => 'France',
            'pdv'    => '30',
        ));
        Country::create(array(
            'name'     => 'Germany',
            'pdv'    => '26',
        ));       
        Country::create(array(
            'name'     => 'Bangladesh',
            'pdv'    => '15',
        ));
        Country::create(array(
            'name'     => 'Italy',
            'pdv'    => '32',
        ));
        
    }
}
