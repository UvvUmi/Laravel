<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmissionMail;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function submit(Request $request)
    {
        $formData = $request->all();
        Mail::to('formaldaniil@gmail.com')->send(new FormSubmissionMail($formData));

        return back()->with('success', 'Forma pateikta ir issiusta el pastu');
    }
}
