<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditController extends Controller
{
    //
    public function index()
    {
        $audits = Audit::with('user')->get();
        return response()->json($audits);
    }
}
