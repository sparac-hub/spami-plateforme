<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Mail\MailTest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function mail($to)
    {
        Mail::to($to)->send(new MailTest());
    }
}
