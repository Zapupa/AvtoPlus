<?php

namespace App\Http\Controllers;

use App\Models\RepairRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
{
    public function index(){
        $repairRequests = RepairRequest::where('user_id', Auth::user()->id)->get();

        return view('repairRequests.index', compact('repairRequests'));
    }

    public function create(){
        return view('repairRequests.create');
    }

    public function store(Request $request){
        $data = $request -> validate([
            'problem' => 'string',
        ]);

        RepairRequest::create([
            'problem' => $data['problem'],
            'repair_date' => '0000-00-00',
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dashboard');
    }
}
