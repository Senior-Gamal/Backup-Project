<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorizeAction(['admin']);
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $this->authorizeAction(['admin']);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $this->authorizeAction(['admin']);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:admin,manager,viewer',
            'password' => 'nullable|min:6',
        ]);

        if ($validated['password'] ?? false) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User updated');
    }

    public function destroy(User $user)
    {
        $this->authorizeAction(['admin']);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }

    private function authorizeAction(array $roles)
    {
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403);
        }
    }
}
