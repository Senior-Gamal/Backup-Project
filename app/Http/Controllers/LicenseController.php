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

    public function create()
    {
        return view('licenses.create');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'license_key' => 'required|string|max:255',
            'provider' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
        ]);

        \App\Models\License::create($data);

        return redirect()->route('licenses.index')
                         ->with('success', 'License created successfully.');
    }
}
