<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show all profiles
    public function index()
    {
        $profiles = Profile::all();
        return view('pages.profiles.index', compact('profiles'));
    }

    // Show create profile form
    public function create()
    {
        return view('pages.profiles.create');
    }

    // Store new profile
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:profiles,email',
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        Profile::create($validated);

        return Redirect::to('/profiles')->with('success', 'Profile created successfully.');
    }

    // Show profile details
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return view('pages.profiles.show', compact('profile'));
    }

    // Show edit form
    public function update($id)  // NOTE: Matching CategoryController's style, not `edit()`
    {
        $profile = Profile::findOrFail($id);
        return view('pages.profiles.edit', compact('profile'));
    }

    // Save edited profile
    public function editStore(Request $request)
    {
        $profile = Profile::findOrFail($request->profile_id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
            'phone' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image)) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $validated['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        $profile->update($validated);

        return Redirect::to('/profiles')->with('success', 'Profile updated successfully.');
    }

    // Delete profile
    public function destroy(Request $request)
    {
        $profile = Profile::findOrFail($request->profile_id);

        if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image)) {
            Storage::disk('public')->delete($profile->profile_image);
        }

        $profile->delete();

        return Redirect::to('/profiles')->with('success', 'Profile deleted successfully.');
    }
}
