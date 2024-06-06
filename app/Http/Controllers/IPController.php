<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|ip|unique:ips,address',
            'label' => 'required|string'
        ]);

        $ip = IP::create(['address' => $request->address]);
        $ip->comments()->create(['label' => $request->label]);

        Audit::create([
            'user_id' => $request->user()->id,
            'action' => "Added IP {$request->address} with label {$request->label}"
        ]);

        return response()->json($ip, 201);
    }

    public function update(Request $request, IP $ip)
    {
        $request->validate([
            'label' => 'required|string'
        ]);

        $ip->comments()->update(['label' => $request->label]);

        Audit::create([
            'user_id' => $request->user()->id,
            'action' => "Updated IP {$ip->address} to label {$request->label}"
        ]);

        return response()->json($ip);
    }
}
