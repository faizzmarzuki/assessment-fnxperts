<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $company->load('employees');
        $company->append('employee_count');
        return response()->json($company);
    }
}