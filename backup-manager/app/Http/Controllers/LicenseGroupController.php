<?php
namespace App\Http\Controllers;

use App\Models\LicenseGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenseGroupController extends Controller
{
    public function index()
    {
        $groups = LicenseGroup::all();
        return view('license_groups.index', compact('groups'));
    }

    public function create()
    {
        $this->authorizeAction(['admin', 'manager']);
        return view('license_groups.create');
    }

    public function store(Request $request)
    {
        $this->authorizeAction(['admin', 'manager']);

        $validated = $request->validate([
            'name' => 'required',
        ]);

        LicenseGroup::create($validated);
        return redirect()->route('license-groups.index')->with('success', 'License group created');
    }

    public function edit(LicenseGroup $licenseGroup)
    {
        $this->authorizeAction(['admin', 'manager']);
        return view('license_groups.edit', compact('licenseGroup'));
    }

    public function update(Request $request, LicenseGroup $licenseGroup)
    {
        $this->authorizeAction(['admin', 'manager']);

        $validated = $request->validate([
            'name' => 'required',
        ]);

        $licenseGroup->update($validated);
        return redirect()->route('license-groups.index')->with('success', 'License group updated');
    }

    public function destroy(LicenseGroup $licenseGroup)
    {
        $this->authorizeAction(['admin']);
        $licenseGroup->delete();
        return redirect()->route('license-groups.index')->with('success', 'License group deleted');
    }

    private function authorizeAction(array $roles)
    {
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }
}
