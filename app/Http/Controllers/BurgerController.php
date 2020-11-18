<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BurgerController extends Controller
{
    public function index_menu()
    {
        return view('frontend.Menu');
    }
    public function index_home()
    {
        return view('frontend.home');
    }
}
