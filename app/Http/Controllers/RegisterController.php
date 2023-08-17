<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Jobs\SendOtpJob;
use App\Mail\RegistrationSuccessMail;
use App\Mail\UserReportMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\Object_;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255'
        ]);

        DB::table('users')->insert($request->except('_token'));

        for ($i = 0; $i < 50; $i++) {
            dispatch(new SendMailJob((object) $request->all()));
        }

        return redirect()->back()->with('success', 'Registration successfully!');
    }

    public function sendOtp()
    {
        dispatch(new SendOtpJob())->onQueue('high');

        return redirect()->back()->with('success', 'OTP send please check your mail !');
    }
}
