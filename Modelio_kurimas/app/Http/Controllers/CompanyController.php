<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function displayCompanies()
    {
        $companies = Company::all();
        return view('companies', compact('companies'));
    }
}
