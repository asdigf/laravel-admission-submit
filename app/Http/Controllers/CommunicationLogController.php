<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunicationLog;

class CommunicationLogController extends Controller
{
    
    public function index()
    {
        $logs = CommunicationLog::orderBy('sent_at', 'desc')->paginate(10);
        return view('communication_logs.index', compact('logs'));
    }
}
