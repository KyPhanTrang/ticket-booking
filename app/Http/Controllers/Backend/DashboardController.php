<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $template = 'dashboard.index';
        return view('layout.parent_dashboard', compact('template'));
    }
}
