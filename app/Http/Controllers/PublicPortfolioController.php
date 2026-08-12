<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Http\Request;

class PublicPortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $projects = Project::orderBy('order', 'asc')->get();
        $experiences = Experience::orderBy('order', 'asc')->get();
        $educations = Education::orderBy('order', 'asc')->get();
        $skills = Skill::orderBy('order', 'asc')->get()->groupBy('category');

        return view('portfolio.index', compact('profile', 'projects', 'experiences', 'educations', 'skills'));
    }

    public function downloadCv()
    {
        // Try direct file in public/ first (Vercel compatible)
        $publicCv = public_path('CV_Suryandara_Putra.pdf');
        if (file_exists($publicCv)) {
            return response()->download($publicCv, 'CV_Suryandara_Putra.pdf');
        }

        // Fallback: try from storage
        $profile = Profile::first();
        if ($profile && $profile->cv_pdf_path && file_exists(storage_path('app/public/' . $profile->cv_pdf_path))) {
            return response()->download(storage_path('app/public/' . $profile->cv_pdf_path), 'CV_Suryandara_Putra.pdf');
        }

        return redirect()->back()->with('error', 'File CV belum diunggah.');
    }
}
