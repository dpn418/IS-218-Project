<?php
function get_todo_tasks($email) {
    global $db;
    $query = 'SELECT taskID, description, dueDate, urgency FROM todo
              WHERE todo.email = :email AND todo.completed = 0
              ORDER BY dueDate DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $unfinTasks = $statement->fetchAll();
    $statement->closeCursor();
    return $unfinTasks;
}

function get_completed_tasks($email) {
    global $db;
    $query = 'SELECT taskID, description, dueDate, urgency FROM todo
              WHERE todo.email = :email AND todo.completed = 1
              ORDER BY dueDate DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $unfinTasks = $statement->fetchAll();
    $statement->closeCursor();
    return $unfinTasks;
}

function get_urgent_tasks($email) {
    global $db;
    $query = 'SELECT taskID, description, dueDate, urgency FROM todo
              WHERE todo.email = :email AND todo.completed=0 AND urgency=2
              ORDER BY dueDate DESC';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
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

function add_task($email, $title, $description, $dueDate, $urgency) {
    global $db;
    $query = 'INSERT INTO todo
                 (title, description, dueDate, urgency)
              VALUES
                 (:email, :title, :description, :dueDate, :urgency)';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':urgency', $urgency);
    $statement->execute();
    $statement->closeCursor();
}

function edit_task($taskID, $title, $description, $dueDate, $urgency) {
    global $db;
    $query = 'UPDATE INTO todo
              SET title = :title, description = :description, dueDate = :dueDate, urgency = :urgency
			  WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':urgency', $urgency);
    $statement->execute();
    $statement->closeCursor();
}

function complete_task($taskID){
	global $db;
    $query = 'UPDATE INTO todo
              SET completed = 1
			  WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}

function UNcomplete_task($taskID){
	global $db;
    $query = 'UPDATE INTO todo
              SET completed = 0
			  WHERE taskID = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}
?>