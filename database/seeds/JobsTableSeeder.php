<?php

use Illuminate\Database\Seeder;
use App\Job;
use Faker\Factory;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->truncate();
        $listJob=[];
        $faker=Factory::create();
        for ($i=0; $i <10 ; $i++) { 
                $listJob[]=[
                    'name'=>$faker->words(2,5),
                    'salary'=>rand(7500000, 10000000),
                    'descriptions'=>$faker->name()
                ];
        }

        DB::table('jobs')->insert($listJob);
    }
}
