<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Mail\ApplicationAcceptedMail;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    // Danh sách + filter + search
    public function webIndex(Request $request)
    {
        $query = Application::query();

        if ($request->status) $query->where('status', $request->status);
        if ($request->payment_status) $query->where('payment_status', $request->payment_status);
        if ($request->search) $query->where('applicant_name','like',"%{$request->search}%");

        $applications = $query->orderBy('application_id','desc')->paginate(10);

        return view('applications.index', compact('applications'));
    }

    // Form create
    public function webCreate() { return view('applications.create'); }

    // Store
    public function webStore(Request $request)
    {
        $request->validate([
            'applicant_name'=>'required|string|max:255',
            'programme'=>'required|string|max:255',
            'intake'=>'required|string|max:255',
            'payment_status'=>'required|in:unpaid,partial,paid'
        ]);

        Application::create([
            'application_id'=>'APP-'.date('Y').'-'.str_pad(rand(1,9999),4,'0',STR_PAD_LEFT),
            'applicant_name'=>$request->applicant_name,
            'programme'=>$request->programme,
            'intake'=>$request->intake,
            'status'=>'Submitted',
            'payment_status'=>$request->payment_status,
        ]);

        return redirect()->route('applications.index')->with('success','Application created!');
    }

    // Form edit
    public function webEdit($id)
    {
        $application = Application::findOrFail($id);
        return view('applications.edit', compact('application'));
    }

    // Update
    public function webUpdate(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $request->validate([
            'applicant_name'=>'required|string|max:255',
            'programme'=>'required|string|max:255',
            'intake'=>'required|string|max:255',
            'status'=>'required|in:Submitted,Accepted,Rejected',
            'payment_status'=>'required|in:unpaid,partial,paid'
        ]);

        $application->update($request->all());
        return redirect()->route('applications.index')->with('success','Application updated!');
    }

    // Delete
    public function webDestroy($id)
    {
        $application = Application::findOrFail($id);
        $application->delete();
        return redirect()->route('applications.index')->with('success','Application deleted!');
    }
    public function sendReminder($id)
    {
        $application = Application::findOrFail($id);

        if ($application->status !== 'Accepted') {
            return redirect()->back()->with('error', 'Application is not accepted yet.');
        }

        Mail::to($application->email)->send(new ApplicationAcceptedMail($application));

       
        \DB::table('communication_logs')->insert([
            'application_id' => $application->application_id,
            'action' => 'send_reminder',
            'template' => 'application_accepted',
            'sent_to' => $application->email,
            'sent_at' => now()
        ]);

        return redirect()->back()->with('success', 'Reminder email sent!');
    }
    public function updateEmail(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $application = Application::findOrFail($id);
        $application->email = $request->email;
        $application->save();

        return redirect()->back()->with('success', 'Email updated successfully!');
    }

    
    
}
