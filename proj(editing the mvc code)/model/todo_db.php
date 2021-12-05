<?php
function get_todo_tasks($username) {
    global $db;
    $query = 'SELECT taskID, description, dueDate, urgency FROM todo
              WHERE todo.username = :username AND todo.completed = 0
              ORDER BY dueDate';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $unfinTasks = $statement->fetchAll();
    $statement->closeCursor();
    return $unfinTasks;
}

function get_completed_tasks($username) {
    global $db;
    $query = 'SELECT taskID, description, dueDate, urgency FROM todo
              WHERE todo.username = :username AND todo.completed = 1
              ORDER BY dueDate';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $unfinTasks = $statement->fetchAll();
    $statement->closeCursor();
    return $unfinTasks;
}

function get_urgent_tasks($username) {
    global $db;
    $query = 'SELECT taskID, description, dueDate, urgency FROM todo
              WHERE todo.username = :username AND todo.completed=0 AND urgency=2
              ORDER BY dueDate';
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $username);
    $statement->execute();
    $unfinTasks = $statement->fetchAll();
    $statement->closeCursor();
    return $unfinTasks;
}

function delete_task($taskID) {
    global $db;
    $query = 'DELETE FROM todo
              WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}

function add_task($category_id, $code, $name, $price) {
    global $db;
    $query = 'INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
              VALUES
                 (:category_id, :code, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>