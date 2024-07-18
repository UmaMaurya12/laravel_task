<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        // Creating sample hierarchy
        $ramesh = Employee::create(['name' => 'Ramesh']);
        $gaurav = Employee::create(['name' => 'Gaurav']);
        $shalu = Employee::create(['name' => 'Shalu']);
        $deepu = Employee::create(['name' => 'Deepu']);
        $kapil = Employee::create(['name' => 'Kapil']);
        $amit = Employee::create(['name' => 'Amit']);
        $shyamLal = Employee::create(['name' => 'Shyam Lal']);
        $prem = Employee::create(['name' => 'Prem']);

        $ramesh->subordinates()->saveMany([$gaurav, $shalu]);
        $shalu->subordinates()->saveMany([$deepu, $amit, $kapil]);
        $gaurav->subordinates()->saveMany([$shyamLal, $prem]);
    }
}