<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('partner.dashboard');
    }
}
