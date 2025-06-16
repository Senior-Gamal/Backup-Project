<?php
namespace App\Http\Controllers;

use App\Models\LicenseGroup;
use Illuminate\Http\Request;

class LicenseGroupController extends Controller
{
    public function index()
    {
        $groups = LicenseGroup::all();
        return view('license_groups.index', compact('groups'));
    }

    public function create()
    {
        return view('license_groups.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
        ]);

        LicenseGroup::create($validated);
        return redirect()->route('license-groups.index')->with('success', 'License group created');
    }

    public function edit(LicenseGroup $licenseGroup)
    {
        return view('license_groups.edit', compact('licenseGroup'));
    }

    public function update(Request $request, LicenseGroup $licenseGroup)
    {

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $licenseGroup->update($validated);
        return redirect()->route('license-groups.index')->with('success', 'License group updated');
    }

    public function destroy(LicenseGroup $licenseGroup)
    {
        $licenseGroup->delete();
        return redirect()->route('license-groups.index')->with('success', 'License group deleted');
    }

}
