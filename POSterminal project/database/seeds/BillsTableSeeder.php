<?php

use Illuminate\Database\Seeder;
use App\Bill;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->delete();

    }
}
