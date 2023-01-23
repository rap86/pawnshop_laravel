<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PtnumberLog;

class PtnumberLogsController extends Controller
{
    public function index()
    {
        $ptnumber_logs = PtnumberLog::all();
        return view('ptnumber_logs.index')->with([
            'ptnumber_logs' => $ptnumber_logs,
        ]);
    }
}
