<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Education;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects_count' => Project::count(),
            'experiences_count' => Experience::count(),
            'skills_count' => Skill::count(),
            'education_count' => Education::count(),
            'unread_messages_count' => ContactMessage::where('is_read', false)->count(),
        ];

        $recent_messages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $recent_projects = Project::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_messages', 'recent_projects'));
    }
}
