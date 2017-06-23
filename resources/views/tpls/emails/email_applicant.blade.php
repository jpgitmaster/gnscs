<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
    	.nm_wrpr {
	        width: 650px;
	        margin: 0 auto;
	    }
	    .nm_wrpr .getlogo{width: 520px; padding: 0; overflow: hidden; min-height: 110px; margin: 0 auto;}
    </style>
</head>
<body>
<?php
$jbpositions = array(
	array('id' => 1, 'name' => 'RN Supervisors'),
    array('id' => 2, 'name' => 'Licensed Speech Therapists'),
    array('id' => 3, 'name' => 'Physical Therapy Assistants'),
    array('id' => 4, 'name' => 'Occupational Therapy Assistants'),
    array('id' => 5, 'name' => 'Certified Nursing Assistants'),
    array('id' => 6, 'name' => 'Licensed Occupational Therapists'),
    array('id' => 7, 'name' => 'Licensed Physical Therapists'),
    array('id' => 8, 'name' => 'Registered Nurses'),
    array('id' => 9, 'name' => 'Licensed Practical Nurses')
);
function selectById($array, $data) {
    foreach($array as $row):
       if($row['id'] == $data) return $row;
    endforeach;
    return NULL;
}
$total_selected = count($applied);
?>
	<div class="nm_wrpr">
		<div class="getlogo">
	        <a class="navbar-brand" href="http://247globalnursingsolution.com">
	          <img src="http://247globalnursingsolution.com/img/email_logo.jpg" class="logo">
	        </a>
	    </div>
	</div>
	<p><strong>Dear {{$user['fname']}} {{$user['lname']}},</strong></p>
	<p>
		Thank you for your interest in joining 24/7 Global Nursing Solution & Consulting Services LLC. This is to acknowledge receipt of your application for the position<?=count($applied) > 1 ? 's': ''?> of 
		<?php
			foreach ($applied as $key => $value):
				$val = selectById($jbpositions, $value);
				$kuwit = $total_selected > 1 && ($total_selected - 1) != $key ? ', ' : ' ';
				echo '<strong>'.$val['name'].'</strong>'.$kuwit;
			endforeach;
		?> dated {{$user['current_date']->format('F d, Y')}}.
		<br><br>
		Please be informed that we are currently reviewing all the resumes received and will get in touch with you if you are shortlisted for an interview. Otherwise, we will keep your resume in our file and contact you if there is more suitable opportunity come up in the future.
		<br><br>
		Kindly check your e-mail regularly for any correspondence regarding your application
		<br><br>

		Sincerely Yours,
		<br>
		24/7 Global Nursing Solution & Consulting Services LLC
	</p>
</body>
</html>