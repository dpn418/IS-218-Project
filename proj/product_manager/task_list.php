<?php include '../view/header.php'; ?>
<main>
    <h1>Task List</h1>
<!-- 
    <aside>
        display a list of categories 
        <h2>Stats</h2>
        <?php// include '../view/stats.php'; ?>        
    </aside>
-->
    <section>
        <!-- display 'very important' tasks; urgency = 2-->
        <h2><?php echo 'Urgent Tasks'; ?></h2>
        <table>
            <tr>
				<th>&nbsp;</th>
                <th>Task</th>
				<th>Description</th>
                <th>Urgency</th>
                <th>Due Date</th>
                <th>Time Left</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($urgentTasks as $urgentTask) : ?>
            <tr>
				<td><form action="." method="post">
					<input type="hidden" name="action"
							value="complete_task">
					<input type="hidden" name="taskID"
                           value="<?php echo $todo['taskID']; ?>">
					<input type="submit" value="Complete">	 
				</form></td>
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
					$timeinterval = $now->diff($due)->format("%y years, %m months, %d days ,%h hours ,%i minutes");
					if($due >= $now){
						echo $timeinterval." left";
					}else{
						echo $timeinterval." past due";
					}
				?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_task">
                    <input type="hidden" name="taskID"
                           value="<?php echo $todo['taskID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
		<!--all unfinished tasks-->
		<h2><?php echo 'To-Do Tasks'; ?></h2>
        <table>
            <tr>
				<th>&nbsp;</th>
                <th>Task</th>
				<th>Description</th>
                <th>Urgency</th>
                <th>Due Date</th>
                <th>Time Left</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($todoTasks as $todoTask) : ?>
            <tr>
				<td><form action="." method="post">
					<input type="hidden" name="action"
							value="complete_task">
					<input type="hidden" name="taskID"
                           value="<?php echo $todo['taskID']; ?>">
					<input type="submit" value="Complete">	 
				</form></td>
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
					$timeinterval = $now->diff($due)->format("%y years, %m months, %d days ,%h hours ,%i minutes");
					if($due >= $now){
						echo $timeinterval." left";
					}else{
						echo $timeinterval." past due";
					}
				?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_task">
                    <input type="hidden" name="taskID"
                           value="<?php echo $todo['taskID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
		<!--completed tasks-->
		<h2><?php echo 'Completed Tasks'; ?></h2>
        <table>
            <tr>
				<th>&nbsp;</th>
                <th>Task</th>
				<th>Description</th>
                <th>Urgency</th>
                <th>Due Date</th>
                <th>Time Left</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($completedTasks as $completedTask) : ?>
            <tr>
				<td><form action="." method="post">
					<input type="hidden" name="action"
							value="UNcomplete_task">
					<input type="hidden" name="taskID"
                           value="<?php echo $todo['taskID']; ?>">
					<input type="submit" value="Uncomplete">	 
				</form></td>
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
					//$due->setTimezone(new DateTimeZone('EST'));
					$tempdate =  date("Y-m-d G:i:s"); //current date
					$now = new DateTime($tempdate);
					//$now->setTimezone(new DateTimeZone('EST'));
					echo $now->format("Y-m-d G:i:s");
					$timeinterval = $now->diff($due)->format("%y years, %m months, %d days ,%h hours ,%i minutes");
					if($due >= $now){
						echo $timeinterval." left";
					}else{
						echo $timeinterval." past due";
					}
				?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_task">
                    <input type="hidden" name="taskID"
                           value="<?php echo $todo['taskID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Task</a></p>
        <p class="last_paragraph"><a href="?action=list_categories">
                List Categories</a>
        </p>        
    </section>
</main>
<?php include '../view/footer.php'; ?>