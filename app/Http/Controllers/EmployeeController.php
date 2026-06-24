<?php
namespace App\Http\Controllers;

use App\Models\{Company, Employee};
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employees.index', compact('employees'));
    }
    public function create()
    {
        $companies = Company::all();
        return view('employees.create', compact('companies'));
    }
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee created.');
    }
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')->with('success', 'Employee updated.');
    }
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted.');
    }
}