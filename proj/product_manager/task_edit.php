<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="edit_task_form">
        <input type="hidden" name="action" value="edit_task">
		<input type="hidden" name="taskID" value="<?php echo $taskID;?>">
        <label>Title:</label>
        <input type="text" name="title" maxlength="50" value="<?php echo $task_to_edit[0]['title'];?>" />
        <br>

        <label>Description:</label>
        <input type="text" name="description" maxlength="500" value="<?php echo $task_to_edit[0]['description'];?>"/>
        <br>

        <label>Due Date:</label><!--date form '2021-12-10 04:20:00',-->
		<?php //get and break up date to autoset existing date into selects
			$due = new DateTime($task_to_edit[0]['dueDate']);
			$year = $due->format("Y");
			$month = $due->format("m");
			$date = $due->format("d");
			$hour = $due->format("G");
			$minute = $due->format("i");
			$second = $due->format("s");
		?>
		<table>
			<tr>
				<th>Year</th>
				<th>Month</th>
                <th>Date</th>
			</tr>
			<tr>
				<td><input type="text" name="year" maxlength="4" value="<?php echo $year;?>"/>
				<td><select name="month">
					<option value='01' <?php if($month =="01"){echo "selected";}?>>January</option>
					<option value='02' <?php if($month =="02"){echo "selected";}?>>February</option>
					<option value='03' <?php if($month =="03"){echo "selected";}?>>March</option>
					<option value='04' <?php if($month =="04"){echo "selected";}?>>April</option>
					<option value='05' <?php if($month =="05"){echo "selected";}?>>May</option>
					<option value='06' <?php if($month =="06"){echo "selected";}?>>June</option>
					<option value='07' <?php if($month =="07"){echo "selected";}?>>July</option>
					<option value='08' <?php if($month =="08"){echo "selected";}?>>August</option>
					<option value='09' <?php if($month =="09"){echo "selected";}?>>September</option>
					<option value='10' <?php if($month =="10"){echo "selected";}?>>October</option>
					<option value='11' <?php if($month =="11"){echo "selected";}?>>November</option>
					<option value='12' <?php if($month =="12"){echo "selected";}?>>December</option>
				</select></td>
				<td><select name="date">
					<?php
						for ($i = 1; $i<=31; $i++){
							$val = sprintf('%02d', $i);
							if ($val == $date){
								echo '<option value='.$val.' selected>'.$val.'</option>';
							}else{
								echo '<option value='.$val.'>'.$val.'</option>';
							}
						}							
					?>
				</select></td>
			</tr>
			<tr>
                <th>Hour</th>
                <th>Minute</th>
				<th>Seconds</th>
			</tr>
			<tr>
				<td><select name="hour">
					<?php
						for ($i = 0; $i<=23; $i++){
							$val = sprintf('%02d', $i);
							if ($val == $hour){
								echo '<option value='.$val.' selected>'.$val.'</option>';
							}else{
								echo '<option value='.$val.'>'.$val.'</option>';
							}
						}							
					?>
				</select></td>
				<td><select name="minute">
					<?php
						for ($i = 0; $i<=59; $i++){
							$val = sprintf('%02d', $i);
							if ($val == $minute){
								echo '<option value='.$val.' selected>'.$val.'</option>';
							}else{
								echo '<option value='.$val.'>'.$val.'</option>';
							}
						}							
					?>
				</select></td>
				<td><select name="second">
					<?php
						for ($i = 0; $i<=59; $i++){
							$val = sprintf('%02d', $i);
							if ($val == $second){
								echo '<option value='.$val.' selected>'.$val.'</option>';
							}else{
								echo '<option value='.$val.'>'.$val.'</option>';
							}
						}							
					?>
				</select></td>
			</tr>
		</table>
		
		<label>Urgency:</label>
        <select name="urgency">
			<option value=0 <?php if($task_to_edit[0]['urgency'] =="0"){echo "selected";}?>>Normal</option>
			<option value=1 <?php if($task_to_edit[0]['urgency'] =="1"){echo "selected";}?>>Important</option>
			<option value=2 <?php if($task_to_edit[0]['urgency'] =="2"){echo "selected";}?>>Very Important</option>
        </select>
        <br>
		
        <label>&nbsp;</label>
        <input type="submit" value="Edit Task" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_tasks">View Task List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>