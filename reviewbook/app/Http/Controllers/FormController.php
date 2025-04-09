<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('page.register');
    }

    public function submitForm(Request $request)
    {
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');

        return view('page.welcome', compact('firstName', 'lastName'));
    }
}
