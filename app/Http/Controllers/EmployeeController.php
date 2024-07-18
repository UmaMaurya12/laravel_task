<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    
        {
            $employees = Employee::whereNull('manager_id')->with('subordinates')->get();
    
            return view('employees', compact('employees'));
        }
}
