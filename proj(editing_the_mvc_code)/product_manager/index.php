<?php
require('../model/database.php');
require('../model/user_db.php');
require('../model/task_db.php');

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
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price');
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid task data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_product($category_id, $code, $name, $price);
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