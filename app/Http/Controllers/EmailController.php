<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $data = [
            'name' => 'laravel',
            'message' => 'This is a test email from Laravel 12.'
        ];

        Mail::to('aditisavaliya60@gmail.com')->send(new SendEmail($data));

        return response()->json(['success' => 'Email sent successfully.']);
    }
}
