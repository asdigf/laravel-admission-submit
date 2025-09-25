<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Application;

class RegistrationController extends Controller
{
    
    public function showForm()
    {
        return view('registrations.create');
    }

   
    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'programme' => 'required|string|max:255',
            'intake' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'phone' => 'required|string|max:20',
        ]);

     
        $registration = \App\Models\Registration::create($validated);

      
        $applicationId = 'APP-' . date('Y') . '-' . rand(1000, 9999);

        
        \App\Models\Application::create([
            'application_id' => $applicationId,
            'applicant_name' => $registration->student_name,
            'programme' => $registration->programme,
            'intake' => $registration->intake,
            'email' => $registration->email, 
            'status' => 'Submitted',
            'payment_status' => 'unpaid',
        ]);

        return redirect()->back()->with('success', 'Registration successful! Application created.');
    }
    public function index()
    {
        $registrations = Registration::paginate(10); 
        return view('registrations.index', compact('registrations'));
    }
}
