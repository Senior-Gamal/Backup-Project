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
        $licenses = \App\Models\License::all();
        return view('licenses.index', compact('licenses'));
    }
}
