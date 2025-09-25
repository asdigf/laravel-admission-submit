<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Application;

class ApplicationStatusController extends Controller
{
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'new_status' => 'required|in:Submitted,Accepted,Rejected',
            'changed_by' => 'required|string|max:255'
        ]);

        
        $application = Application::findOrFail($id);
        $current_status = $application->status;
        $new_status = $request->new_status;

        // Kiểm tra pipeline hợp lệ
        $valid_transitions = [
            'Submitted' => ['Accepted','Rejected'],
            'Accepted' => [],
            'Rejected' => [],
        ];

        if (!in_array($new_status, $valid_transitions[$current_status])) {
            return redirect()->back()->with('error', "Invalid status transition from $current_status to $new_status");
        }

       
        DB::transaction(function() use ($application, $current_status, $new_status, $request) {
            
            $application->status = $new_status;
            $application->save();

            
            DB::table('application_status_logs')->insert([
                'application_id' => $application->application_id,
                'from_status' => $current_status,
                'to_status' => $new_status,
                'changed_by' => $request->changed_by,
                'changed_at' => now()
            ]);
        });

        return redirect()->back()->with('success', "Application status changed from $current_status to $new_status");
        
    }
    public function index()
    {
        
        $logs = DB::table('application_status_logs')->get();

        return view('application_status_logs.index', compact('logs'));
    }
}
