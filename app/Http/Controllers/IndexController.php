<?php

namespace App\Http\Controllers;

use App\Models\AboutList;
use App\Models\AboutMe;
use App\Models\Hero;
use App\Models\Project;
use Illuminate\Http\Request;
use Orchid\Attachment\File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        $about = AboutMe::first();
        $projects = Project::all();
        $skills = AboutList::where('category', '=', 'skill')->get();
        $interests = AboutList::where('category', '=', 'interest')->get();
        $educations = AboutList::where('category', '=', 'education')->get();

        $attachment = $hero->attachment()->first();
        
        $cv_path = null;
        if ($attachment) {
            $cv_path = $attachment->url();   
        }
        

        return view('index', compact([
            'hero',
            'about',
            'projects',
            'skills',
            'interests',
            'educations',
            'cv_path',
        ]));
    }

}
