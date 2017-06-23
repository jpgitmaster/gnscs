<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
$total_selected = count($applied);
?>
    <p>You have 1 Jobseeker applied! Please check the details below:</p>
    <ul>
    	<li>
    		<strong>Name:</strong> {{$user['fname']}} {{$user['mname']}} {{$user['lname']}}
    	</li>
    	<li>
    		<strong>Date Applied:</strong> {{$user['current_date']->format('F d, Y')}}
    	</li>
    	<li>
    		<strong>Positions Applied:</strong> 
        <?php
            foreach ($applied as $key => $value):
                $val = selectById($jbpositions, $value);
                $kuwit = $total_selected > 1 && ($total_selected - 1) != $key ? ', ' : ' ';
                echo $val['name'].$kuwit;
            endforeach;
        ?>
    	</li>
    	<li>
    		<strong>Uploaded Resume:</strong> 
    		<a href="http://247globalnursingsolution.com/{{$resume['folder']}}/{{$resume['resume_name']}}.{{$resume['extension']}}">
		    	{{$resume['resume_name']}}.{{$resume['extension']}}
		    </a>
    	</li>
    </ul>
</body>
</html>