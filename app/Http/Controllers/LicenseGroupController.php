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
        $licenseGroups = \App\Models\LicenseGroup::all();
        return view('license-groups.index', compact('licenseGroups'));
    }
}
