<?php

namespace App\Http\Controllers;

use App\Jobs\TransferMoneyJob;
use Illuminate\Http\Request;

class TransferMoneyController extends Controller
{
    public function create()
    {
        return view('transfer');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric'
        ]);

        dispatch(new TransferMoneyJob($request->amount));

        return redirect()->back()->with('success', 'Transferring money please wait...');
    }
}
