<?php
namespace App\Http\Controllers;

class LicenseGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('license-groups.index');
    }
}
