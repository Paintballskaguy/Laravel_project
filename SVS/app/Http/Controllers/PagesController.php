<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function about(){
        return view('pages.about');
    }
public function index() {
    if(auth()->check()){
        return redirect('/dashboard');
    }

    // LANDING PAGE: For guests, show the origin story landing page
    $title = 'Welcome to SVS';    
    return view('pages.index', compact('title'));
}
    public function services() {
        $data = array(
            'title'=> 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}