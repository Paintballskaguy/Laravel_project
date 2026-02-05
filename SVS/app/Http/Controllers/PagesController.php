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

    // For guests, point to your dedicated welcome file
    $title = 'Welcome to SVS';    
    return view('pages.welcome', compact('title'));
}
        public function services() {
            $data = array(
                'title' => 'Tech Support',
                'services' => ['Network Infrastructure', 'Software Deployment', 'Security Audits', 'Cloud Systems']
            );
            return view('pages.services')->with($data);
        }
}