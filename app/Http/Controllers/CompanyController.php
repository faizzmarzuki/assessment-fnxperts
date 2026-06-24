<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    public function store(StoreCompanyRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Company::create($data);
        return redirect()->route('companies.index')->with('success', 'Company created.');
    }
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            if ($company->logo) Storage::disk('public')->delete($company->logo);
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $company->update($data);
        return redirect()->route('companies.index')->with('success', 'Company updated.');
    }
    public function destroy(Company $company)
    {
        if ($company->logo) Storage::disk('public')->delete($company->logo);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted.');
    }
}