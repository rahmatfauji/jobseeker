<?php

use Illuminate\Database\Seeder;
use App\Job;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new Job;
        $job->name='IT Support';
        $job->salary=5000000;
        $job->descriptions='SMK TKJ';
        $job->save();
    }
}
