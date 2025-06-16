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

    public function create()
    {
        return view('license-groups.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        \App\Models\LicenseGroup::create($data);

        return redirect()->route('license-groups.index')
                         ->with('success', 'License group created successfully.');
    }
}
