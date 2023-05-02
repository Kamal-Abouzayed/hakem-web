<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function about()
    {
        $pageTitle = __('About Us');

        return view('web.about', compact('pageTitle'));
    }

    public function terms()
    {
        $pageTitle = __('Terms of Use');

        return view('web.terms', compact('pageTitle'));
    }
}
