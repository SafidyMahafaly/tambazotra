<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KenoController extends Controller
{
    public function index()
    {
        return view('keno.index');
    }
}
