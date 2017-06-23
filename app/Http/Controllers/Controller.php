<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $import = [
    	'stylesheet' 	=> [],
    	'scripts' 		=> [],
    	'ngular' 		=> []
    ];

    public function __construct(){
    	$this->import_css();
    	$this->import_js();
    	$this->import_ng();
    }

    public function import_css(){
    	define('c_home', 'css/gnscs/pages_out/home.css');
        define('c_about', 'css/gnscs/pages_out/about.css');
        define('c_services', 'css/gnscs/pages_out/services.css');
        define('c_careers', 'css/gnscs/pages_out/careers.css');
    	define('c_contacts', 'css/gnscs/pages_out/contactus.css');

        define('c_applicants', 'css/gnscs/admin/applicants.css');
        define('c_jobs', 'css/gnscs/admin/jobs.css');

        define('c_resume1', 'css/gnscs/resumes/resume1.css');

        define('c_ngmotion', 'plugins/angular-motion/dist/angular-motion.min.css');
        define('c_summernote', 'plugins/summernote/dist/summernote.css');
    }

    public function import_js(){
        define('j_summernote', 'plugins/summernote/dist/summernote.min.js');
        define('j_velocity', 'plugins/velocity/velocity.min.js');
        define('j_velocityui', 'plugins/velocity/velocity.ui.min.js');

        define('j_global', 'app/jquery/global.js');
    }

    public function import_ng(){
    	define('n_home', 'app/pages_out/home.js');
        define('n_about', 'app/pages_out/about.js');
        define('n_services', 'app/pages_out/services.js');
        define('n_careers', 'app/pages_out/careers.js');
        define('n_contacts', 'app/pages_out/contactus.js');

        define('n_admin', 'app/admin/ng_admin.js');
        define('n_a_applicants', 'app/admin/ng_admin_applicants.js');
        define('n_a_jobs', 'app/admin/ng_admin_jobs.js');

    	define('n_mask', 'plugins/ui-mask/dist/mask.min.js');
    	define('n_bootstrap', 'plugins/ui-bootstrap.min.js');
        define('n_summernote', 'plugins/angular-summernote/dist/angular-summernote.min.js');
    }
}
