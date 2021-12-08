<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_task_form">
        <input type="hidden" name="action" value="add_task">

        <label>Title:</label>
        <input type="text" name="title" maxlength="50"/>
        <br>

        <label>Description:</label>
        <input type="text" name="description" maxlength="500"/>
        <br>

        <label>Due Date:</label>
		<table>
			<tr>
				<th>Year</th>
				<th>Month</th>
                <th>Date</th>
			</tr>
			<tr>
				<td><input type="text" name="year" maxlength="4"/><!--date form '2021-12-10 04:20:00',--></td>
				<td><select name="month">
					<option value='1'>January</option>
					<option value='2'>February</option>
					<option value='3'>March</option>
					<option value='4'>April</option>
					<option value='5'>May</option>
					<option value='6'>June</option>
					<option value='7'>July</option>
					<option value='8'>August</option>
					<option value='9'>September</option>
					<option value='10'>October</option>
					<option value='11'>November</option>
					<option value='12'>December</option>
				</select></td>
				<td><input type="text" name="date"maxlength="2"/></td>
			</tr>
			<tr>
                <th>Hour</th>
                <th>Minute</th>
				<th>Seconds</th>
			</tr>
			<tr>
				<td><input type="text" name="hour"maxlength="2"/></td>
				<td><input type="text" name="minute"maxlength="2"/></td>
				<td><input type="text" name="second"maxlength="2"/></td>
			</tr>
		</table>
        <br>
		
		<label>Urgency:</label>
        <select name="urgency">
			<option value=0>Normal</option>
			<option value=1>Important</option>
			<option value=2>Very Important</option>
        </select>
        <br>
		
        <label>&nbsp;</label>
        <input type="submit" value="Add Task" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_tasks">View Task List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>