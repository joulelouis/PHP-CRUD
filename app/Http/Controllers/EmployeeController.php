<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();

        return view('employees.index', ['employees' => $employees]);
    }

    public function create() {
        return view('employees.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birthday' => 'required|date',
            'monthly_salary' => 'required|decimal:0,2'
        ]);

        $newEmployee = Employee::create($data);

        return redirect(route('employee.index'));
    }

    public function edit(Employee $employee){
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request){
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'birthday' => 'required|date',
            'monthly_salary' => 'required|decimal:0,2'
        ]);

        $employee->update($data);

        return redirect(route('employee.index'))->with('success', 'Employee Information Updated Successfully');
    }

    public function destroy(Employee $employee){
        $employee->delete();

        return redirect(route('employee.index'))->with('success', 'Employee Information Deleted Successfully');
    }

    public function summary(){
        $genderCounts = Employee::select('gender', DB::raw('COUNT(*) as count'))
            ->groupBy('gender')
            ->get();

        $averageAge = Employee::select(DB::raw('AVG(YEAR(CURDATE()) - YEAR(birthday)) as average_age'))
            ->first();

        $totalSalary = Employee::sum('monthly_salary');

        return view('employees.employees-summary', compact('genderCounts', 'averageAge', 'totalSalary'));
    }
}
