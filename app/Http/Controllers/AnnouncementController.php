<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('announcements.index');
    }

    public function flash()
    {
        if( Auth::check() ){
            $announce = Announcement::where('user_id', Auth::user()->id)->latest()->first();

            if (!$announce) $announce = null;

            return view('announcements.index')
                ->with(['announce' => $announce]);
        }

    }

    public function sendAnnounce()
    {
        if (Auth::check()) {
            $announce = Announcement::where('user_id', Auth::user()->id)->latest()->first();

            if (!$announce) $announce = null;

            return view('announcements.send')
                ->with(['announce' => $announce]);
        }
    }

    public function incomingAnnounce()
    {
        return view('announcements.incoming');
    }
}
