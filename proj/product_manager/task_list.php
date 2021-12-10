
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title>Gaming Tasks</title>
    <link rel="stylesheet" href="../main.css">
    <script defer src="view/validation.js"></script>
</head>
<header>
    <h1>Gaming Tasks</h1>
</header>

<main>
<main>

    <h1>Task List</h1>

    <section>
		<p><a href="?action=show_add_form">Add Task</a></p>
		<h2>Statistics</h2>
		<table>
			<tr>
				<th>Urgent unfinished Tasks</th>
				<th>Total unfinished Tasks</th>
				<th>Completed Tasks</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td style="color:red;"><strong><?php echo $urgentStats[0][0]." tasks left";?> </strong></td>
				<td><?php echo $unfinStats[0][0]." tasks left";?> </td>
				<td><?php echo $completedStats[0][0]." tasks completed";?></td>
				<td>
					<form action="." method="post">
						<input type="hidden" name="action" value="list_tasks">
						<?php 
							if($sort =='desc'){
								echo "<input type=\"hidden\" name=\"sort\" value=\"asc\">";
								echo "<input type=\"submit\" value=\"Sort by ascending\">";
							}elseif($sort =='asc'){
								echo "<input type=\"hidden\" name=\"sort\" value=\"desc\">";
								echo "<input type=\"submit\" value=\"Sort by descending\">";
							}
						?>
					</form>
				</td>
			</tr>
		</table>
        <!-- display 'very important' tasks; urgency = 2-->
        <h2>Urgent Tasks</h2>
        <table>
            <tr>
				<th>&nbsp;</th>
                <th>Task</th>
				<th>Description</th>
                <th>Urgency</th>
                <th>Due Date</th>
                <th>Time Left</th>
            </tr>
            <?php foreach ($urgentTasks as $urgentTask) : ?>
            <tr>
				<td>
					<form action="." method="post">
						<input type="hidden" name="action" value="complete_task">
						<input type="hidden" name="taskID" value="<?php echo $urgentTask['taskID']; ?>">
						<input type="submit" value="Complete">	 
					</form>
					<form action="." method="post">
						<input type="hidden" name="action" value="show_edit_form">
						<input type="hidden" name="taskID" value="<?php echo $urgentTask['taskID']; ?>">
						<input type="submit" value="Edit">	 
					</form>
					<form action="." method="post">
						<input type="hidden" name="action" value="delete_task">
						<input type="hidden" name="taskID" value="<?php echo $urgentTask['taskID']; ?>">
						<input type="submit" value="Delete">
					</form>
				</td>
                <td><?php echo $urgentTask['title']; ?></td>
                <td><?php echo $urgentTask['description']; ?></td>
                <td><?php 
					$urge = $urgentTask['urgency'];
					switch ($urge){
						case 0:
							echo "Normal";
							break;
						case 1:
							echo "Important";
							break;
						case 2:
							echo "Very Important";
							break;
					}
				?></td>
                <td><?php echo $urgentTask['dueDate']; ?></td>
				<td><?php
					date_default_timezone_set("EST");
					$due = new DateTime($urgentTask['dueDate']);
					$tempdate =  date("Y-m-d G:i:s"); //current date
					$now = new DateTime($tempdate);
					$timeinterval = $now->diff($due)->format("%y years, %m months, %d days , %h hours , %i minutes");
					if($due >= $now){
						echo $timeinterval." left";
					}else{
						echo $timeinterval." past due";
					}
				?></td>
            </tr>
            <?php endforeach; ?>
        </table>
		<!--all unfinished tasks-->
		<h2>To-Do Tasks</h2>
        <table>
            <tr>
				<th>&nbsp;</th>
                <th>Task</th>
				<th>Description</th>
                <th>Urgency</th>
                <th>Due Date</th>
                <th>Time Left</th>
            </tr>
            <?php foreach ($todoTasks as $todoTask) : ?>
            <tr>
				<td>
					<form action="." method="post">
						<input type="hidden" name="action" value="complete_task">
						<input type="hidden" name="taskID" value="<?php echo $todoTask['taskID']; ?>">
						<input type="submit" value="Complete">	 
					</form>
					<form action="." method="post">
						<input type="hidden" name="action" value="show_edit_form">
						<input type="hidden" name="taskID" value="<?php echo $todoTask['taskID']; ?>">
						<input type="submit" value="Edit">	 
					</form>
					<form action="." method="post">
						<input type="hidden" name="action" value="delete_task">
						<input type="hidden" name="taskID" value="<?php echo $todoTask['taskID']; ?>">
						<input type="submit" value="Delete">
					</form>
				</td>
                <td><?php echo $todoTask['title']; ?></td>
                <td><?php echo $todoTask['description']; ?></td>
                <td><?php 
					$urge = $todoTask['urgency'];
					switch ($urge){
						case 0:
							echo "Normal";
							break;
						case 1:
							echo "Important";
							break;
						case 2:
							echo "Very Important";
							break;
					}
				?></td>
                <td><?php echo $todoTask['dueDate']; ?></td>
				<td><?php
					date_default_timezone_set("EST");
					$due = new DateTime($todoTask['dueDate']);
					$tempdate =  date("Y-m-d G:i:s"); //current date
					$now = new DateTime($tempdate);
					$timeinterval = $now->diff($due)->format("%y years, %m months, %d days , %h hours , %i minutes");
					if($due >= $now){
						echo $timeinterval." left";
					}else{
						echo $timeinterval." past due";
					}
				?></td>
            </tr>
            <?php endforeach; ?>
        </table>
		<!--completed tasks-->
		<h2>Completed Tasks</h2>
        <table>
            <tr>
				<th>&nbsp;</th>
                <th>Task</th>
				<th>Description</th>
                <th>Urgency</th>
                <th>Due Date</th>
                <th>Time Left</th>
            </tr>
            <?php foreach ($completedTasks as $completedTask) : ?>
            <tr>
				<td>
					<form action="." method="post">
						<input type="hidden" name="action" value="UNcomplete_task">
						<input type="hidden" name="taskID" value="<?php echo $completedTask['taskID']; ?>">
						<input type="submit" value="Uncomplete">	 
					</form>
					<form action="." method="post">
						<input type="hidden" name="action" value="show_edit_form">
						<input type="hidden" name="taskID" value="<?php echo $completedTask['taskID']; ?>">
						<input type="submit" value="Edit">	 
					</form>
					<form action="." method="post">
						<input type="hidden" name="action" value="delete_task">
						<input type="hidden" name="taskID" value="<?php echo $completedTask['taskID']; ?>">
						<input type="submit" value="Delete">
					</form>
				</td>
                <td><?php echo $completedTask['title']; ?></td>
                <td><?php echo $completedTask['description']; ?></td>
                <td><?php 
					$urge = $completedTask['urgency'];
					switch ($urge){
						case 0:
							echo "Normal";
							break;
						case 1:
							echo "Important";
							break;
						case 2:
							echo "Very Important";
							break;
					}
				?></td>
                <td><?php echo $completedTask['dueDate']; ?></td>
				<td><?php
					date_default_timezone_set("EST");
					$due = new DateTime($completedTask['dueDate']);
					$tempdate =  date("Y-m-d G:i:s"); //current date
					$now = new DateTime($tempdate);
					$timeinterval = $now->diff($due)->format("%y years, %m months, %d days , %h hours , %i minutes");
					if($due >= $now){
						echo $timeinterval." left";
					}else{
						echo $timeinterval." past due";
					}
				?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        
    </section>
</main>
<?php include '../view/footer.php'; ?>