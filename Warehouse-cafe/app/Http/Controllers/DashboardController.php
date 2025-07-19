<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Nanti kita akan menambahkan logika untuk mengambil data di sini
        return view('dashboard');
    }
}
 