<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    /**
     * About Page
     */

     public function AboutPage(){
        $aboutpage = About::find(1);
        return view('backend.about.about_page_all', compact('aboutpage'));
     }
}
