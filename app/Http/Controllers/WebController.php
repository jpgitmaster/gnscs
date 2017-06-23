<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->import = [
            'scripts' => [j_velocity, j_velocityui, j_global]
        ];
    }

    public function home(){
    	return view('pages_out.home', [
    		'stylesheet' 	=> [c_home],
    		'scripts'       => $this->import['scripts'],
    		'ngular' 		=> [n_home]
    	]);
    }

    public function about(){
    	return view('pages_out.about', [
    		'stylesheet' 	=> [c_about],
    		'ngular' 		=> [n_about]
    	]);
    }

    public function services(){
        return view('pages_out.services', [
            'stylesheet'    => [c_services],
            'ngular'        => [n_services]
        ]);
    }

    public function careers(){
        return view('pages_out.careers', [
            'scripts'       => array_merge($this->import['scripts'], [j_summernote]),
            'stylesheet' => [c_careers, c_ngmotion, c_summernote, c_resume1],
            'ngular'    => [n_bootstrap, n_mask, n_summernote, n_careers]
        ]);
    }

    public function contactus(){
        return view('pages_out.contacts', [
            'stylesheet'    => [c_contacts],
            'ngular'        => [n_contacts]
        ]);
    }

    public function user_resume(){
        return view('tpls.resumes.resume');
    }
}
