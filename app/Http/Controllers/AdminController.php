<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use DB;

class AdminController extends Controller
{
	public function __construct()
    {
        parent::__construct();
    	$this->import = [
            'scripts' => [j_velocity, j_velocityui, j_summernote],
            'stylesheet' => [c_ngmotion, c_summernote],
            'ngular'    => [n_bootstrap, n_mask, n_summernote, n_admin]
    	];
    	$this->middleware('auth');
    }

    public function dashboard(){
    	return view('admin.dashboard', []);
    }

    public function applicants(){
        return view('admin.applicants', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => [c_applicants, c_resume1],
            'ngular'        => array_merge($this->import['ngular'], [n_a_applicants])
        ]);
    }

    public function get_applicants(){
        $applicants = DB::table('applicants')
            ->join('personal_information', 'applicants.genid', '=', 'personal_information.genid')
            ->join('resumes', 'applicants.genid', '=', 'resumes.genid')
            ->select(
                'applicants.genid', 'creation_date', 'jobs_id', 'fname', 'mname', 'lname',
                'email', 'avlforwrk', 'typofwork',
                'address1', 'address2', 'mobile', 'phone', 'bday', 'bplace', 'age',
                'gender', 'cstatus', 'objectives', 'workexperience',
                'resume_name', 'folder', 'extension'
            )->orderBy('applicants.id', 'desc')->get();
        $edcs = DB::table('educational_bg')
            ->select(
                'genid', 'educ_type', 'school', 'sdate', 'edate',
                'course', 'awrdsnrcgntn'
            )->get();
        $emps = DB::table('employment_history')
            ->select(
                'genid', 'company', 'position', 'currency', 'salary', 'empsdate', 'empedate',
                'supname', 'canwecontact', 'contctby',
                'empemail', 'empphone', 'empmobile', 'empskype', 'empviber', 'empym',
                'jbdscrptn', 'rsnfrlvng', 'ispresent'
            )->get();

        $chrs = DB::table('character_reference')
            ->select(
                'genid', 'chrname', 'chrrelation', 'chremployer', 'chrposition', 'contctby',
                'chremail', 'chrphone', 'chrmobile', 'chrskype', 'chrviber', 'chrym'
            )->get();
        foreach ($applicants as $key => $applicant) {
            $applicants = json_decode(json_encode($applicants), true);
            $applicant = json_decode(json_encode($applicant), true);

            foreach ($edcs as $edc):
                $edc = json_decode(json_encode($edc), true);
                if($applicant['genid'] === $edc['genid']):
                    $applicants[$key]['edcs'][] = $edc;
                endif;
            endforeach;

            foreach ($emps as $emp):
                $emp = json_decode(json_encode($emp), true);
                if($applicant['genid'] === $emp['genid']):
                    $applicants[$key]['emps'][] = $emp;
                endif;
            endforeach;

            foreach ($chrs as $chr):
                $chr = json_decode(json_encode($chr), true);
                if($applicant['genid'] === $chr['genid']):
                    $applicants[$key]['chrs'][] = $chr;
                endif;
            endforeach;
        }
        // echo json_encode($applicants, JSON_PRETTY_PRINT);
        // dd($applicants);
        return response()->json($applicants);
    }

    public function jobs(){
        return view('admin.jobs', [
            'scripts'       => $this->import['scripts'],
            'stylesheet'    => array_merge($this->import['stylesheet'], [c_jobs]),
            'ngular'        => array_merge($this->import['ngular'], [n_a_jobs])
        ]);
    }
}
