<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('layouts.content');
    }

    public function guru()
    {
        return view('layouts.layout_guru.content_guru');
    }

    public function orangtua()
    {
        return view('layouts.layout_orangtua.content_orangtua');
    }
}
