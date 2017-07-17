<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Response;
use App\Mail\EmailApplicant;
use App\Mail\EmailSupport;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{
    public function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }


    public function userApply(Request $request, Mailer $mailer){
        $msg = [];
        $form   = json_decode($_POST['form'], true);
        $loop_error = 0;
        $messages = [
            'date_format' => 'Invalid date format for your :attribute it should be mm/dd/yyyy. e.g. 04/01/2017',
        ];
        $msg['complete_all'] = false;
        $replace_names = [
        	'avlforwrk'	=> 'Availability for Work',
        	'typofwork' => 'Type of Work',
            'fname' 	=> 'First Name',
            'mname' 	=> 'Middle Name',
            'lname' 	=> 'Last Name',
            'address1'	=> 'Present Address',
            'address2'	=> 'Permanent Address',
            'email' 	=> 'Email Address',
            'mobile'	=> 'Mobile No.',
            'phone'		=> 'Phone No.',
            'bday'  	=> 'Birthdate',
            'bplace'  	=> 'Birthplace',
            'age'  		=> 'Age',
            'gender'  	=> 'Gender',
            'cstatus'  	=> 'Civil Status',
            'objectives' => 'Career Objectives',
        	'educ_type'	=> 'Type of Education',
        	'school' 	=> 'School Name',
            'sdate' 	=> 'Start Date',
            'edate' 	=> 'End Date',
            'course' 	=> 'Course',
            'awrdsnrcgntn' => 'Awards and Recognition',
            'company'	=> 'Employer',
        	'position' 	=> 'Position',
        	'salary'	=> 'Salary',
            'empsdate' 	=> 'Start Date',
            'empedate' 	=> 'End Date',
            'supname' 	=> "Supervisor's Name",
            'canwecontact' => 'Can we contact',
            'empphone' 	=> 'Phone',
            'empmobile' => 'Mobile',
            'empskype' 	=> 'Skype',
            'empviber' 	=> 'Viber',
            'empym' 	=> 'Yahoo Messenger',
            'empemail' 	=> 'Email',
            'jbdscrptn'	=> 'Job Description',
            'rsnfrlvng' => 'Reason for Leaving',
            'chrname' 	=> 'Name',
    		'chrrelation' 	=> 'Relation',
    		'chremployer' 	=> 'Employer',
    		'chrposition' 	=> 'Position',
            'contctby' 	=> 'Contact By',
            'chremail' 	=> 'Email',
            'chrphone' 	=> 'Phone',
            'chrmobile' => 'Mobile',
            'chrskype' 	=> 'Skype',
            'chrviber' 	=> 'Viber',
            'chrym' 	=> 'Yahoo Messenger'
        ];
        date_default_timezone_set('America/Los_Angeles');
	    // date_default_timezone_set('Asia/Manila');
        switch ($form):
        	case 0:
        		$slctn = isset($_POST['slctn']) ? $_POST['slctn'] : '';
        		
        		$messages = [
	                'required' => 'Please select any job positions available.',
	            ];
        		$validate = Validator::make($_POST, [
	            	'slctn' => 'required'
	            ], $messages);
	            $has_error = $this->hasError($validate);
        		$msg['error'] = $validate->messages()->toArray();
        		break;
        	case 1:
        		$validate = Validator::make(
	            	['file' => $request->file('file')],
	            	['file' => 'required|mimes:doc,docx|max:500']
	            );
	            $replace_names = ['file' => 'File'];
	            $msg['error'] = $validate->messages()->toArray();
	            $has_error = $this->hasError($validate);
        		break;
        	case 2:
        		$user   = json_decode($_POST['user'], true);
	            $user   = isset($user) ? $user : [];
	            
	            if(isset($user['bday'])):
	            	$user['bday'] = date('m/d/Y', strtotime($user['bday']));
	            endif;
	            if(isset($user['avlforwrk'])):
	            	$user['avlforwrk'] = date('m/d/Y', strtotime($user['avlforwrk']));
	            endif;
	            // print_r($user);

	            $validate = Validator::make($user, [
	            	'avlforwrk' => 'required|date_format:m/d/Y',
	            	'typofwork' => 'required',
	                'fname' 	=> 'required|min:2|max:30|regex:/^[\pL\s\-]+$/u',
	                'mname' 	=> 'required|min:2|max:30|regex:/^[\pL\s\-]+$/u',
	                'lname' 	=> 'required|min:2|max:30|regex:/^[\pL\s\-]+$/u',
	                'address1'	=> 'required|min:10|max:200',
	                'address2'	=> 'min:10|max:200',
	                'email' 	=> 'required|email|max:80|unique:personal_information',
	                'mobile'	=> 'required|min:4|max:30',
	                'phone'		=> 'min:4|max:30',
	                'bday'  	=> 'required|date|date_format:m/d/Y',
	                'bplace'  	=> 'required|min:1|max:100',
	                'gender'  	=> 'required',
	                'cstatus'  	=> 'required',
	                'objectives' => 'required|min:20|max:400'
	            ], $messages);
	            $validate->setAttributeNames($replace_names);
	            $msg['error'] = $validate->messages()->toArray();
	            $has_error = $this->hasError($validate);
        		break;
        	case 3:
        		$edcs   = json_decode($_POST['edcs'], true);
	            $edcs   = isset($edcs) ? $edcs : [];
	            for ($i = 0; $i < count($edcs); $i++):
	            	if(isset($edcs[$i]['sdate'])):
		            	$edcs[$i]['sdate'] = date('m/d/Y', strtotime($edcs[$i]['sdate']));
		            endif;
		            if(isset($edcs[$i]['edate'])):
		            	$edcs[$i]['edate'] = date('m/d/Y', strtotime($edcs[$i]['edate']));
		            endif;
		            if(isset($edcs[$i]['educ_type'])):
		            	$validate_course = $edcs[$i]['educ_type'] == 2 ? 'required|max:150' : '';
		            endif;
	            	$validate = Validator::make($edcs[$i], [
		                'educ_type' => 'required',
		                'school' 	=> 'required|max:150',
		                'sdate' 	=> 'required|date|date_format:m/d/Y',
		                'edate' 	=> 'required|date|date_format:m/d/Y',
		                'course' 	=> $validate_course,
		                'awrdsnrcgntn' 	=> 'max:400'
		            ], $messages);
	            	$validate->setAttributeNames($replace_names);
	            	$msg['error']['edc'][] = $validate->messages()->toArray();
	            	$has_error = $this->hasError($validate);
	            	$loop_error += count($validate->messages()->toArray());
	            endfor;
	            break;
        	case 4:
        		$emps   = json_decode($_POST['emps'], true);
	            $emps   = isset($emps) ? $emps : [];
	            $user   = json_decode($_POST['user'], true);
	            $user   = isset($user) ? $user : [];

	            // print_r($emps);
	            if(isset($user['workexperience'])):
	            	if($user['workexperience'] != 1):
			            for ($i = 0; $i < count($emps); $i++):
			            	$validate_email[$i] = '';
			            	$validate_phone[$i] = '';
			            	$validate_mobile[$i] = '';
			            	$validate_skype[$i] = '';
			            	$validate_viber[$i] = '';
			            	$validate_ym[$i] = '';
			            	$validate_contctby[$i] = '';
			            	$validate_empedate[$i] = 'required|date|date_format:m/d/Y';
			            	if(isset($emps[$i]['ispresent'])):
			            		if($emps[$i]['ispresent'] == 1):
			            			$validate_empedate[$i] = '';
			            		else:
			            			$validate_empedate[$i] = 'required|date|date_format:m/d/Y';
			            		endif;
			            	endif;
			            	if(isset($emps[$i]['empsdate'])):
				            	$emps[$i]['empsdate'] = date('m/d/Y', strtotime($emps[$i]['empsdate']));
				            endif;
				            if(isset($emps[$i]['empedate'])):
				            	$emps[$i]['empedate'] = date('m/d/Y', strtotime($emps[$i]['empedate']));
				            endif;
				            if(isset($emps[$i]['canwecontact'])):
				            	$validate_contctby[$i] = $emps[$i]['canwecontact'] == 1 ? '' : 'required';
				            	if($emps[$i]['canwecontact'] == 2):
						            if(isset($emps[$i]['contctby'])):
						            	switch ($emps[$i]['contctby']):
						            		case 1:
						            			$validate_email[$i] = 'required|email|max:150';
						            			break;
						            		case 2:
						            			$validate_phone[$i] = 'required|max:20';
						            			break;
						            		case 3:
						            			$validate_mobile[$i] = 'required|max:20';
						            			break;
						            		case 4:
						            			$validate_skype[$i] = 'required|max:30';
						            			break;
						            		case 5:
						            			$validate_viber[$i] = 'required|max:30';
						            			break;
						            		case 6:
						            			$validate_ym[$i] = 'required|max:30';
						            			break;
						            	endswitch;
						            endif;
						        endif;
					        endif;

			            	$validate = Validator::make($emps[$i], [
				                'company' 	=> 'required|max:200',
				                'position' 	=> 'required|max:100',
				                'salary' 	=> 'required|numeric',
				                'empsdate' 	=> 'required|date|date_format:m/d/Y',
				                'empedate' 	=> $validate_empedate[$i] ? $validate_empedate[$i] : '',
				                'supname' 	=> 'required|regex:/^[\pL\s\-]+$/u|max:100',
				                'canwecontact' 	=> 'required',
				                'contctby' 	=> $validate_contctby[$i] ? $validate_contctby[$i] : '',
				                'empemail' 	=> $validate_email[$i] ? $validate_email[$i] : '',
				                'empphone' 	=> $validate_phone[$i] ? $validate_phone[$i] : '',
				                'empmobile' => $validate_mobile[$i] ? $validate_mobile[$i] : '',
				                'empskype' 	=> $validate_skype[$i] ? $validate_skype[$i] : '',
				                'empviber' 	=> $validate_viber[$i] ? $validate_viber[$i] : '',
				                'empym' 	=> $validate_ym[$i] ? $validate_ym[$i] : '',
				                'jbdscrptn' => 'required|min:50|max:600',
				                'rsnfrlvng' => 'required|min:50|max:600'
				            ], $messages);
			            	$validate->setAttributeNames($replace_names);
			            	$msg['error']['emp'][] = $validate->messages()->toArray();
			            	$has_error = $this->hasError($validate);
			            	$loop_error += count($validate->messages()->toArray());
			            endfor;
			        else:
			        	$validate = Validator::make($user, [], $messages);
			            $has_error = $this->hasError($validate);
			        endif;
		        else:
		        	$validate = Validator::make($user, [
		            	'workexperience' => 'required'
		            ], $messages);
		            $validate->setAttributeNames($replace_names);
		            $msg['error'] = $validate->messages()->toArray();
		            $has_error = $this->hasError($validate);
	            endif;
        		break;
        	case 5:
        		$chrs   = json_decode($_POST['chrs'], true);
	            $chrs   = isset($chrs) ? $chrs : [];
	            for ($i = 0; $i < count($chrs); $i++):
	            	$validate_email[$i] = '';
	            	$validate_phone[$i] = '';
	            	$validate_mobile[$i] = '';
	            	$validate_skype[$i] = '';
	            	$validate_viber[$i] = '';
	            	$validate_ym[$i] = '';
	            	if(isset($chrs[$i]['contctby'])):
		            	switch ($chrs[$i]['contctby']):
		            		case 1:
		            			$validate_email[$i] = 'required|email|max:150';
		            			break;
		            		case 2:
		            			$validate_phone[$i] = 'required|max:20';
		            			break;
		            		case 3:
		            			$validate_mobile[$i] = 'required|max:20';
		            			break;
		            		case 4:
		            			$validate_skype[$i] = 'required|max:30';
		            			break;
		            		case 5:
		            			$validate_viber[$i] = 'required|max:30';
		            			break;
		            		case 6:
		            			$validate_ym[$i] = 'required|max:30';
		            			break;
		            	endswitch;
		            endif;
	            	$validate = Validator::make($chrs[$i], [
	            		'chrname' 	=> 'required|max:100',
	            		'chrrelation' 	=> 'required|max:100',
	            		'chremployer' 	=> 'required|max:150',
	            		'chrposition' 	=> 'required|max:150',
		                'contctby' 	=> 'required',
		                'chremail' 	=> $validate_email[$i] ? $validate_email[$i] : '',
		                'chrphone' 	=> $validate_phone[$i] ? $validate_phone[$i] : '',
		                'chrmobile' => $validate_mobile[$i] ? $validate_mobile[$i] : '',
		                'chrskype' 	=> $validate_skype[$i] ? $validate_skype[$i] : '',
		                'chrviber' 	=> $validate_viber[$i] ? $validate_viber[$i] : '',
		                'chrym' 	=> $validate_ym[$i] ? $validate_ym[$i] : ''
		            ], $messages);
	            	$validate->setAttributeNames($replace_names);
	            	$msg['error']['chr'][] = $validate->messages()->toArray();
	            	
	            	$has_error = $this->hasError($validate);

	            	$loop_error += count($validate->messages()->toArray());
	            	$msg['complete_all'] = $loop_error > 0 ? false : true;
	            endfor;
        		break;
        endswitch;
        if($has_error == true || $loop_error > 0):
        	$msg['has_error'] = true;
        else:
        	$msg['has_error'] = false;
        	$msg['success'] = $form;
        	if($msg['complete_all'] == true):
        		$gen_id  = $this->getToken(20);
        		$slctn = isset($_POST['slctn']) ? $_POST['slctn'] : '';

                // $resume['encrypted_name'] = Crypt::encryptString($resume['file']);
                // $resume['decrypted_name'] = Crypt::decryptString($resume['encrypted_name']);
        		$user   = json_decode($_POST['user'], true);
            	$user   = isset($user) ? $user : [];

            	$resume = [];
            	$resume['folder'] = 'resumes';
            	$resume['file'] = $request->file('file')->getClientOriginalName();
            	$resume['extension'] = $request->file('file')->getClientOriginalExtension();
            	$resume['resume_name'] = strtolower(str_replace(' ', '_', $user['fname'])).'_'.strtolower(str_replace(' ', '_', $user['mname'])).'_'.strtolower(str_replace(' ', '_', $user['lname'])).'_'.$this->getToken(10);

            	$edcs   = json_decode($_POST['edcs'], true);
	            $edcs   = isset($edcs) ? $edcs : [];
	            $emps   = json_decode($_POST['emps'], true);
	            $emps   = isset($emps) ? $emps : [];
	            $messages = [
				    'dclrechckbx.required' => 'You need to state that all records is correct.'
				];
				if(isset($user['dclrechckbx'])):
					$user['dclrechckbx'] = $user['dclrechckbx'] == '1' ? $user['dclrechckbx'] : '';
				endif;
	            $validate = Validator::make($user, [
	            	'dclrechckbx' => 'required'
	            ], $messages);

	            $msg['error'] = $validate->messages()->toArray();
	            $has_error = $this->hasError($validate);
	            if($has_error == true || $loop_error > 0):
        			$msg['has_error'] = true;
	            else:
	            	$applied = explode(',', $slctn);
	            	$user['current_date'] = Carbon::now();
	            	$mailer->to($user['email'])
	                ->send(new EmailApplicant($user, $applied));

		            $mailer->to('support@247globalnursingsolution.com')->cc('vasquezjp14@gmail.com')
		                ->send(new EmailSupport($resume, $user, $applied));

		            if( count($mailer->failures()) > 0 ):
		                print_r(count($mailer->failures()));
		            else:

			        	if($request->hasFile('file')):
			                // Storage::putFile('resumes', $request->file('file'));
		                    $path = $request->file('file')->move(public_path($resume['folder']), $resume['resume_name'].'.'.$resume['extension']);
		                    DB::table('resumes')->insert([
			                    'genid' 	=> $gen_id,
			                    'resume_name' 	=> $resume['resume_name'],
			                    'folder' 	=> $resume['folder'],
			                    'extension' => $resume['extension'],
			                    'file' 		=> $resume['file']
			                ]);
			            endif;
			            if(isset($user['avlforwrk'])):
			            	$user['avlforwrk'] = date('Y-m-d', strtotime($user['avlforwrk']));
			            endif;
			            if(isset($user['bday'])):
			            	$user['bday'] = date('Y-m-d', strtotime($user['bday']));
			            endif;
			            DB::table('applicants')->insert([
			            	'genid' 	=> isset($gen_id) ? $gen_id : '',
		                    'creation_date' => Carbon::now(),
		                    'last_update' 	=> Carbon::now(),
		                    'dclrechckbx' 	=> !empty($user['dclrechckbx']) ? $user['dclrechckbx'] : '0'
		                ]);    
			            DB::table('personal_information')->insert([
			            	'genid' 	=> isset($gen_id) ? $gen_id : '',
		                    'jobs_id' 	=> isset($slctn) ? '['.$slctn.']' : '',
		                    'fname' 	=> isset($user['fname']) ? $user['fname'] : '',
		                    'mname' 	=> isset($user['mname']) ? $user['mname'] : '',
		                    'lname' 	=> isset($user['lname']) ? $user['lname'] : '',
		                    'email' 	=> isset($user['email']) ? $user['email'] : '',
		                    'avlforwrk'	=> isset($user['avlforwrk']) ? $user['avlforwrk'] : '0000-01-01',
		                    'typofwork' => isset($user['typofwork']) ? $user['typofwork'] : '0',
		                    'address1' 	=> isset($user['address1']) ? $user['address1'] : '',
		                    'address2' 	=> isset($user['address2']) ? $user['address2'] : '',
		                    'mobile' 	=> isset($user['mobile']) ? $user['mobile'] : '',
		                    'phone' 	=> isset($user['phone']) ? $user['phone'] : '',
		                    'bday' 		=> isset($user['bday']) ? $user['bday'] : '0000-01-01',
		                    'bplace' 	=> isset($user['bplace']) ? $user['bplace'] : '',
		                    'age' 		=> isset($user['age']) ? $user['age'] : '0',
		                    'gender' 	=> isset($user['gender']) ? $user['gender'] : '0',
		                    'cstatus' 	=> isset($user['cstatus']) ? $user['cstatus'] : '0',
		                    'objectives' => isset($user['objectives']) ? $user['objectives'] : '',
		                    'workexperience' => isset($user['workexperience']) ? $user['workexperience'] : '0'
		                ]);
		                for ($i = 0; $i < count($edcs); $i++):
			            	if(isset($edcs[$i]['sdate'])):
				            	$edcs[$i]['sdate'] = date('Y-m-d', strtotime($edcs[$i]['sdate']));
				            endif;
				            if(isset($edcs[$i]['edate'])):
				            	$edcs[$i]['edate'] = date('Y-m-d', strtotime($edcs[$i]['edate']));
				            endif;
				            DB::table('educational_bg')->insert([
				            	'genid' 	=> $gen_id,
				            	'educ_type' => isset($edcs[$i]['educ_type']) ? $edcs[$i]['educ_type'] : '0',
				            	'school' 	=> isset($edcs[$i]['school']) ? $edcs[$i]['school'] : '',
			                    'sdate' 	=> isset($edcs[$i]['sdate']) ? $edcs[$i]['sdate'] : '0000-01-01',
			                    'edate' 	=> isset($edcs[$i]['edate']) ? $edcs[$i]['edate'] : '0000-01-01',
			                    'course' 	=> isset($edcs[$i]['course']) ? $edcs[$i]['course'] : '',
			                    'awrdsnrcgntn' 	=> isset($edcs[$i]['awrdsnrcgntn']) ? $edcs[$i]['awrdsnrcgntn'] : ''
			                ]);
				        endfor;

				        for ($m = 0; $m < count($emps); $m++):
				        	if(isset($emps[$m]['empsdate'])):
				            	$emps[$m]['empsdate'] = date('Y-m-d', strtotime($emps[$m]['empsdate']));
				            endif;
				            if(isset($emps[$m]['empedate'])):
				            	$emps[$m]['empedate'] = date('Y-m-d', strtotime($emps[$m]['empedate']));
				            endif;
				            DB::table('employment_history')->insert([
				            	'genid' 	=> $gen_id,
				            	'company' 	=> isset($emps[$m]['company']) ? $emps[$m]['company'] : '',
				            	'position' 	=> isset($emps[$m]['position']) ? $emps[$m]['position'] : '',
				            	'currency' 	=> isset($emps[$m]['currency']) ? $emps[$m]['currency'] : '0',
				            	'salary' 	=> isset($emps[$m]['salary']) ? $emps[$m]['salary'] : '',
				            	'empsdate' 	=> isset($emps[$m]['empsdate']) ? $emps[$m]['empsdate'] : '0000-01-01',
			                    'empedate' 	=> isset($emps[$m]['empedate']) ? $emps[$m]['empedate'] : '0000-01-01',
			                    'supname' 	=> isset($emps[$m]['supname']) ? $emps[$m]['supname'] : '',
			                    'canwecontact' 	=> isset($emps[$m]['canwecontact']) ? $emps[$m]['canwecontact'] : '0',
			                    'contctby' 	=> isset($emps[$m]['contctby']) ? $emps[$m]['contctby'] : '0',
			                    'empemail' 	=> isset($emps[$m]['empemail']) ? $emps[$m]['empemail'] : '',
			                    'empphone' 	=> isset($emps[$m]['empphone']) ? $emps[$m]['empphone'] : '',
			                    'empmobile' => isset($emps[$m]['empmobile']) ? $emps[$m]['empmobile'] : '',
			                    'empskype' 	=> isset($emps[$m]['empskype']) ? $emps[$m]['empskype'] : '',
			                    'empviber' 	=> isset($emps[$m]['empviber']) ? $emps[$m]['empviber'] : '',
			                    'empym' 	=> isset($emps[$m]['empym']) ? $emps[$m]['empym'] : '',
			                    'jbdscrptn' => isset($emps[$m]['jbdscrptn']) ? $emps[$m]['jbdscrptn'] : '',
			                    'rsnfrlvng' => isset($emps[$m]['rsnfrlvng']) ? $emps[$m]['rsnfrlvng'] : '',
			                    'ispresent' => !empty($emps[$m]['ispresent']) ? $emps[$m]['ispresent'] : '0'
			                ]);
				        endfor;

				        for ($c = 0; $c < count($chrs); $c++):
				            DB::table('character_reference')->insert([
				            	'genid' 	=> $gen_id,
				            	'chrname' 	=> isset($chrs[$c]['chrname']) ? $chrs[$c]['chrname'] : '',
				            	'chrrelation' 	=> isset($chrs[$c]['chrrelation']) ? $chrs[$c]['chrrelation'] : '',
				            	'chremployer' 	=> isset($chrs[$c]['chremployer']) ? $chrs[$c]['chremployer'] : '',
				            	'chrposition' 	=> isset($chrs[$c]['chrposition']) ? $chrs[$c]['chrposition'] : '',
				            	'contctby' 	=> isset($chrs[$c]['contctby']) ? $chrs[$c]['contctby'] : '0',
			                    'chremail' 	=> isset($chrs[$c]['chremail']) ? $chrs[$c]['chremail'] : '',
			                    'chrphone' 	=> isset($chrs[$c]['chrphone']) ? $chrs[$c]['chrphone'] : '',
			                    'chrmobile' => isset($chrs[$c]['chrmobile']) ? $chrs[$c]['chrmobile'] : '',
			                    'chrskype' 	=> isset($chrs[$c]['chrskype']) ? $chrs[$c]['chrskype'] : '',
			                    'chrviber' 	=> isset($chrs[$c]['chrviber']) ? $chrs[$c]['chrviber'] : '',
			                    'chrym' 	=> isset($chrs[$c]['chrym']) ? $chrs[$c]['chrym'] : ''
			                ]);
				        endfor;
		            endif;
	            endif;
        	endif;
        endif;
    	print_r(json_encode($msg, JSON_PRETTY_PRINT));
    }

    public function hasError($validate){
    	if(isset($validate)):
	        if($validate->fails()):
	        	$result = true;
	        else:
	        	$result = false;
	        endif;
	        return $result;
	    endif;
    }
}
