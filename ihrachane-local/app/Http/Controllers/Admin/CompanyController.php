<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function edit(Company $company)
    {

        return view('backend.company.edit', compact('company'));
    }
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'whatsapp_number' => 'required',
        ]);
        $company->update($request->all());
        return redirect()->route('company.edit', ['company' => $company->id])
            ->with('success', 'Company Profile  updated successfully');
    }
}
