<?php
require('../model/database.php');
require('../model/user_db.php');
require('../model/todo_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tasks';
    }
}

if ($action == 'list_tasks') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    
	$todoTasks = get_todo_tasks($email);
    $urgentTasks = get_urgent_tasks($email);
	$completedTasks = get_completed_tasks($email);
    include('task_list.php');
} else if ($action == 'delete_task') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
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
	$urgency = filter_input(INPUT_POST, 'urgency', FILTER_VALIDATE_INT);
    if ($title == NULL || $description == NULL || 
			$year == NULL || $year == FALSE || 
			$month == NULL || $date == NULL || 
			$hour == NULL || $minute == NULL || 
			$urgency == NULL || $urgency == FALSE) {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    }elseif((($month == '04' || $month == '06' || $month == '09' || $month == '11' || ) && (intval($date)>30)) ||
				($month == '04' && intval($date)>28)){
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
        add_task($email, $title, $description, $dueDate, $urgency) ;
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('view/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>