<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Image;
use App\Models\Section;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $pageTitle = 'لوحة التحكم';

        $users = count(User::whereDoesntHave('roles')->get());

        $employees = count(User::role(['employee'])->get());

        $videos = count(Video::get());

        $images = count(Image::get());

        $adsCount = count(Ad::get());

        $sections = Section::with(['categories', 'advices'])->get();

        return view('dashboard.home', compact('pageTitle', 'users', 'videos', 'images', 'adsCount', 'sections', 'employees'));
    }
}
