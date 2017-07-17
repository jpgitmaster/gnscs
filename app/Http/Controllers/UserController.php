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
    public function userApply(Request $request, Mailer $mailer){
        $msg = [];
        $form   = json_decode($_POST['form'], true);
        $loop_error = 0;
        $msg['complete_all'] = false;

        switch ($form):
        	case 0:
        		$validate = Validator::make(
	            	['file' => $request->file('file')],
	            	['file' => 'required|mimes:doc,docx|max:500']
	            );
	            $replace_names = ['file' => 'File'];
	            $msg['error'] = $validate->messages()->toArray();
	            $has_error = $this->hasError($validate);
        		break;
        endswitch;
        if($has_error == true || $loop_error > 0):
        	$msg['has_error'] = true;
        else:
        	$msg['has_error'] = false;
        	$msg['success'] = $form;
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
