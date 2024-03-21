<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create doctor schedule
        $hour = rand(0, 23);
        $currentTime = Carbon::createFromTime($hour, rand(0, 59), rand(0, 59));


        //auto generate doctor schedule
        \App\Models\Doctor::all()->each(function ($doctor) use ($currentTime) {
            \App\Models\DoctorSchedule::factory()->count(3)->create([
                'doctor_id' => $doctor->id,
                'time' => $currentTime
            ]);
        });
    }
}
