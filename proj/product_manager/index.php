<?php
require('../model/database.php');
require('../model/user_db.php');
require('../model/todo_db.php');
session_start();
if(array_key_exists('email', $_SESSION)){
    $email = $_SESSION['email'];
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
	echo "im right here";
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
}
?>