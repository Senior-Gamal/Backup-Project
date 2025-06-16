<?php
namespace App\Http\Controllers;

use App\Models\License;
use App\Models\LicenseGroup;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::with(['server', 'licenseGroup'])->get();
        return view('licenses.index', compact('licenses'));
    }

    public function create()
    {
        $this->authorizeAction(['admin', 'manager']);
        $servers = Server::all();
        $groups = LicenseGroup::all();
        return view('licenses.create', compact('servers', 'groups'));
    }

    public function store(Request $request)
    {
        $this->authorizeAction(['admin', 'manager']);

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
        $this->authorizeAction(['admin', 'manager']);
        $servers = Server::all();
        $groups = LicenseGroup::all();
        return view('licenses.edit', compact('license', 'servers', 'groups'));
    }

    public function update(Request $request, License $license)
    {
        $this->authorizeAction(['admin', 'manager']);

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
        $this->authorizeAction(['admin']);
        $license->delete();
        return redirect()->route('licenses.index')->with('success', 'License deleted');
    }

    private function authorizeAction(array $roles)
    {
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }
}
