<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Factory;

use App\Http\Requests;

class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('home');
    }
}
