<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('BillsTableSeeder');
        $this->call('CountriesTableSeeder');
    }
}
