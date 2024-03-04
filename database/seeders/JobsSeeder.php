<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(DB::table('job')->count() == 0){
            DB::table('job')->insert([
                [
                    "title" => "Global Branding Supervisor",
                    "description" => "Investor",
                    "type" => "Representative",
                    "area" => "Security",
                    "state" => "Florida",
                    "streetAddress" => "992 Zachary Course",
                ],
                [
                    "title" => "Regional Tactics Facilitator",
                    "description" => "Future",
                    "type" => "Associate",
                    "area" => "Response",
                    "state" => "Arizona",
                    "streetAddress" => "34832 Norfolk Road",
                ],
                [
                    "title" => "Future Identity Technician",
                    "description" => "Internal",
                    "type" => "Director",
                    "area" => "Infrastructure",
                    "state" => "Vermont",
                    "streetAddress" => "24984 S Mill Street",
                ],
            

            ]);
        }
    }
}
