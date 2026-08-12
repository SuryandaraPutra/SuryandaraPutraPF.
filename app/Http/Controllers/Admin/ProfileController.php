<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();
        if (!$profile) {
            $profile = Profile::create([
                'full_name' => 'SURYANDARA PUTRA',
                'title' => 'Mahasiswa Teknologi Informasi — Semester 7',
                'subtitle' => 'Target Magang: September 2026',
                'about_me' => 'Mahasiswa aktif Semester 7...',
                'email' => 'andraalputra21@gmail.com',
                'phone' => '(+62) 857-1028-9368',
                'location' => 'Depok, Jawa Barat',
            ]);
        }
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrFail();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'about_me' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'location' => 'required|string',
            'gpa' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // max 2MB
            'cv_pdf' => 'nullable|file|mimes:pdf|max:5120', // max 5MB
            'github' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'whatsapp' => 'nullable|string',
        ]);

        if ($request->filled('photo_url')) {
            $profile->photo_path = trim($request->photo_url);
        } elseif ($request->hasFile('photo')) {
            if ($profile->photo_path && !\Illuminate\Support\Str::startsWith($profile->photo_path, ['http://', 'https://'])) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            $photoPath = $request->file('photo')->store('profiles', 'public');
            $profile->photo_path = $photoPath;
        }

        if ($request->hasFile('cv_pdf')) {
            if ($profile->cv_pdf_path) {
                Storage::disk('public')->delete($profile->cv_pdf_path);
            }
            $path = $request->file('cv_pdf')->store('cv', 'public');
            $profile->cv_pdf_path = $path;
        }

        $profile->full_name = $validated['full_name'];
        $profile->title = $validated['title'];
        $profile->subtitle = $validated['subtitle'];
        $profile->about_me = $validated['about_me'];
        $profile->email = $validated['email'];
        $profile->phone = $validated['phone'];
        $profile->location = $validated['location'];
        $profile->gpa = $validated['gpa'];

        $profile->social_links = [
            'github' => $request->github,
            'linkedin' => $request->linkedin,
            'email' => 'mailto:' . $validated['email'],
            'whatsapp' => $request->whatsapp,
        ];

        $profile->save();

        return redirect()->back()->with('success', 'Profil, Foto Utama, dan file CV berhasil diperbarui!');
    }
}
