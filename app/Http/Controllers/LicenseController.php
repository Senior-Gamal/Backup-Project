<?php
namespace App\Http\Controllers;

class LicenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('licenses.index');
    }
}
