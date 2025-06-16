<?php
namespace App\Http\Controllers;

use App\Models\License;
use App\Models\LicenseGroup;
use App\Models\Server;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::with(['server', 'licenseGroup'])->get();
        return view('licenses.index', compact('licenses'));
    }

    public function create()
    {
        $servers = Server::all();
        $groups = LicenseGroup::all();
        return view('licenses.create', compact('servers', 'groups'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'server_id' => 'required|exists:servers,id',
            'license_group_id' => 'required|exists:license_groups,id',
            'license_key' => 'required',
            'expires_at' => 'nullable|date',
        ]);

        License::create($validated);
        return redirect()->route('licenses.index')->with('success', 'License created');
    }

    public function edit(License $license)
    {
        $servers = Server::all();
        $groups = LicenseGroup::all();
        return view('licenses.edit', compact('license', 'servers', 'groups'));
    }

    public function update(Request $request, License $license)
    {

        $validated = $request->validate([
            'server_id' => 'required|exists:servers,id',
            'license_group_id' => 'required|exists:license_groups,id',
            'license_key' => 'required',
            'expires_at' => 'nullable|date',
        ]);

        $license->update($validated);
        return redirect()->route('licenses.index')->with('success', 'License updated');
    }

    public function destroy(License $license)
    {
        $license->delete();
        return redirect()->route('licenses.index')->with('success', 'License deleted');
    }

}
