<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
	public function index()
    {
		return view('start');
    }

	public function about() { return view('about'); }
	public function terms() { return view('terms'); }
	public function privacy() { return view('privacy'); }
}
