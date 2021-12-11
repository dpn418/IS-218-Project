<?php

//test('h'); //tried to test this doesn't work for some reason
require('../model/database.php');
require('../model/user_db.php');
require('../model/todo_db.php');

if(session_status()!=2){ //edited just now
    session_start();
}


if(array_key_exists('email', $_SESSION)){
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
	$user = $_SESSION['user'];
	
    $currentpass = $_SESSION['pass'];
    $prevpass1 = $_SESSION['prevpass1'];
	$prevpass2 = $_SESSION['prevpass2'];
}
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tasks';
    }
}
$sort = filter_input(INPUT_POST, 'sort');
if ($sort == NULL) {
    $sort = filter_input(INPUT_GET, 'sort');
    if ($sort == NULL) {
        $sort = 'desc';
    }
}
/* hardcoded email for testing
$email = filter_input(INPUT_POST, 'email');
if ($email == NULL) {
    $email = filter_input(INPUT_GET, 'email');
    if ($email == NULL) {
         $email = "givemey0urdata@gmail.com";
    }
}
*/

if ($action == 'list_tasks') {
	$unfinStats = get_unfin_stats($email);
	$urgentStats = get_urgent_stats($email);
	$completedStats = get_completed_stats($email);
	if($sort == 'desc'){
		$todoTasks = get_todo_tasks($email);
		$urgentTasks = get_urgent_tasks($email);
		$completedTasks = get_completed_tasks($email);
	}elseif ($sort == 'asc'){
		$todoTasks = get_todo_tasks_rev($email);
		$urgentTasks = get_urgent_tasks_rev($email);
		$completedTasks = get_completed_tasks_rev($email);
	}
    include('task_list.php');
} else if ($action == 'delete_task') {
    $task_id = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
    if ($task_id == NULL || $task_id == FALSE){
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    } else { 
        delete_task($task_id);
        header("Location: .");
    }
} else if ($action == 'show_add_form') {
    include('task_add.php');    
} else if ($action == 'add_task') {
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $month = filter_input(INPUT_POST, 'month');
    $date = filter_input(INPUT_POST, 'date');
    $hour = filter_input(INPUT_POST, 'hour');
    $minute = filter_input(INPUT_POST, 'minute');
    $second = filter_input(INPUT_POST, 'second');
	$urgency = filter_input(INPUT_POST, 'urgency');
    if ($title == NULL || $description == NULL || 
			$year == NULL || $year == FALSE || 
			$month == NULL || $date == NULL || 
			$hour == NULL || $minute == NULL || 
			$urgency == NULL) {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    }elseif((($month == '04' || $month == '06' || $month == '09' || $month == '11') && (intval($date)>30))
				|| ($month == '04' && intval($date)>28)){
		$error = "Invalid date. Please check date and month fields again";
        include('../errors/error.php');
	}else { 
	//build dueDate in datetime  '2021-12-10 04:20:00'
		$dueDate = $year."-";
		$dueDate .= $month."-";
		$dueDate .= $date." ";
		$dueDate .= $hour.":";
		$dueDate .= $minute.":";
		$dueDate .= $second;
		//$email = "givemey0urdata@gmail.com";//testing stub replace with session email later
        add_task($email, $title, $description, $dueDate, $urgency) ;
        header("Location: .");
    }
} else if ($action == 'complete_task') {
    echo "checking";
    $task_id = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
    if ($task_id == NULL || $task_id == FALSE){
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    } else { 
        complete_task($task_id);
        header("Location: .");
    }
} else if ($action == 'UNcomplete_task') {
    $task_id = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
    if ($task_id == NULL || $task_id == FALSE){
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    } else { 
        UNcomplete_task($task_id);
        header("Location: .");
    }
} else if ($action == 'show_edit_form') {
    $taskID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
    if ($taskID == NULL || $taskID == FALSE){
        $error = "Missing or incorrect task id.";
        include('../errors/error.php');
    } else { 
		echo $taskID."<br>";
		$task_to_edit = get_task($taskID);
        include('task_edit.php');
    }
} else if ($action == 'edit_task') {
	$taskID = filter_input(INPUT_POST, 'taskID');
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $month = filter_input(INPUT_POST, 'month');
    $date = filter_input(INPUT_POST, 'date');
    $hour = filter_input(INPUT_POST, 'hour');
    $minute = filter_input(INPUT_POST, 'minute');
    $second = filter_input(INPUT_POST, 'second');
	$urgency = filter_input(INPUT_POST, 'urgency');
    if ($title == NULL || $description == NULL || 
			$year == NULL || $year == FALSE || 
			$month == NULL || $date == NULL || 
			$hour == NULL || $minute == NULL || 
			$urgency == NULL ||$taskID ==NULL) {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    }elseif((($month == '04' || $month == '06' || $month == '09' || $month == '11') && (intval($date)>30))
				|| ($month == '04' && intval($date)>28)){
		$error = "Invalid date. Please check date and month fields again";
        include('../errors/error.php');
	}else { 
	//build dueDate in datetime  '2021-12-10 04:20:00'
		$dueDate = $year."-";
		$dueDate .= $month."-";
		$dueDate .= $date." ";
		$dueDate .= $hour.":";
		$dueDate .= $minute.":";
		$dueDate .= $second;
        edit_task($taskID, $title, $description, $dueDate, $urgency) ;
        header("Location: .");
		echo "bout to send edit query";
    }
} else if ($action == 'show_userchange_form') {
	$badpass = 0;
	$baduser=0;
	$succuser=0;
	$succpass =0;
	$incorrectpassword_user=0;
	$incorrectpassword_pass=0;
	$notmatch_user=0;
	$notmatch_pass=0;
    include('user_edit.php');
} else if($action == 'edit_account_username'){
	$newuser = filter_input(INPUT_POST, 'newuser');
	$currpass = filter_input(INPUT_POST, 'currpass');
	$verpass = filter_input(INPUT_POST, 'verpass');
	if ($newuser == NULL ||$currpass==NULL || $verpass==NULL){
		$error = "Invalid field data, please try again.";
        include('../errors/error.php');
	}else{
		$uniqueuser = uniqueUsername($newuser);
		if($uniqueuser[0][0] > 0){
			$baduser =1;
			$badpass = 0;
			$succuser=0;
			$succpass =0;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=0;
			$notmatch_user=0;
			$notmatch_pass=0;
			include('user_edit.php');
		}elseif($currpass!=$currentpass){
			$badpass =0;
			$baduser=0;
			$succuser=0;
			$succpass =0;
			$incorrectpassword_user=1;
			$incorrectpassword_pass=0;
			$notmatch_user=0;
			$notmatch_pass=0;
			include('user_edit.php');
		}elseif($currpass!=$verpass){
			$badpass =0;
			$baduser=0;
			$succuser=0;
			$succpass =0;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=0;
			$notmatch_user=1;
			$notmatch_pass=0;
			include('user_edit.php');
		}else{
			$pattern = "/^[a-zA-Z\d]+(\.?((?<=\.)([.]*[a-zA-Z\d]+)+$)|[a-zA-Z\d]*$)/";//username pattern
			if(preg_match($pattern, $newuser)){
			edit_account_username($email, $newuser);
			$_SESSION['user'] = $newuser;
			$user = $newuser;
			$_SESSION['username'] = $newuser;
			$badpass = 0;
			$baduser=0;
			$succuser=1;
			$succpass =0;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=0;
			$notmatch_user=0;
			$notmatch_pass=0;
			include('user_edit.php');
			}else{
				$badpass = 0;
				$baduser=2;
				$succuser=0;
				$succpass =0;
				$incorrectpassword_user=0;
				$incorrectpassword_pass=0;
				$notmatch_user=0;
				$notmatch_pass=0;
				include('user_edit.php');
			}
		}
	}
} else if($action == 'edit_account_password'){
	$newpass = filter_input(INPUT_POST, 'newpass');
	$currpass = filter_input(INPUT_POST, 'currpass');
	$verpass = filter_input(INPUT_POST, 'verpass');
	if ($newpass == NULL||$currpass==NULL || $verpass==NULL){
		$error = "Invalid field data, please try again.";
        include('../errors/error.php');
	}else{
		$uniquepass = uniquePassword($email, $newpass);
		if($uniquepass[0][0] > 0){
			$badpass =1;
			$baduser=0;
			$succuser=0;
			$succpass =0;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=0;
			$notmatch_user=0;
			$notmatch_pass=0;
			include('user_edit.php');
		}elseif($currpass!=$currentpass){
			$badpass =0;
			$baduser=0;
			$succuser=0;
			$succpass =0;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=1;
			$notmatch_user=0;
			$notmatch_pass=0;
			include('user_edit.php');
		}elseif($currpass!=$verpass){
			$badpass =0;
			$baduser=0;
			$succuser=0;
			$succpass =0;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=0;
			$notmatch_user=0;
			$notmatch_pass=1;
			include('user_edit.php');
		}else{
			$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,30}$/";
			if(preg_match($pattern, $newpass)){
			edit_account_password($email, $newpass, $currentpass, $prevpass1);
			$_SESSION['pass'] = $newpass;
			$currentpass = $newpass;
			$_SESSION['password'] = $newpass;
			$badpass = 0;
			$baduser=0;
			$succuser=0;
			$succpass =1;
			$incorrectpassword_user=0;
			$incorrectpassword_pass=0;
			$notmatch_user=0;
			$notmatch_pass=0;
			include('user_edit.php');
			}else{
				$badpass = 2;
				$baduser=0;
				$succuser=0;
				$succpass =0;
				$incorrectpassword_user=0;
				$incorrectpassword_pass=0;
				$notmatch_user=0;
				$notmatch_pass=0;
				include('user_edit.php');
			}
		}
	}
}
?>