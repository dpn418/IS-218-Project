<?php include '../view/header.php'; ?>

<main>
	<h1>Change Username From</h1>
	<form action="index.php" method="post" id="edit_account_form">
		<input type="hidden" name="action" value="edit_account_username">
		<table>
			<tr>
				<td><label>New Username:</label></td>
				<td>
					<input type="text" maxlength="250" name="newuser" value="<?php echo $user;?>">
				</td>
				<td>
					<?php
						if($baduser==1){
							echo "This username has been taken, please choose a different one.";
						}elseif($baduser ==2){
							echo "Invalid username ,please make a new username";
						}elseif($succuser){
							echo "Username successfully changed.";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><label>Current Password:</label></td>
				<td>
					<input type="text" maxlength="250" name="currpass">
				</td>
				<td>
					<?php
						if($incorrectpassword_user==1){
							echo "Incorrect current password.";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><label> Verify Current Password:</label></td>
				<td>
					<input type="text" maxlength="250" name="verpass">
				</td>
				<td>
					<?php
						if($notmatch_user==1){
							echo "Passwords do not match";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Change Username" />
				</td>
			</tr>
		</table>
	</form>
	<h1>Change Password Form</h1>
	<form action="index.php" method="post" id="edit_account_form">
		<input type="hidden" name="action" value="edit_account_password">
		<table>
			<tr>
				<td><label>New Password:</label></td>
				<td>
					<input type="password" maxlength="30" name="newpass" value="<?php echo $currentpass;?>">
				<td>
				</td>
					<?php
						if($badpass==1){
							echo "You've used this password before please make a new password";
						}elseif($badpass ==2){
							echo "Invalid password ,please make a new password";
						}elseif($succpass){
							echo "Password successfully changed.";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><label>Current Password:</label></td>
				<td>
					<input type="text" maxlength="250" name="currpass">
				</td>
				<td>
					<?php
						if($incorrectpassword_pass==1){
							echo "Incorrect current password.";
						}
					?>
				</td>
			</tr>
			<tr>
				<td><label> Verify Current Password:</label></td>
				<td>
					<input type="text" maxlength="250" name="verpass">
				</td>
				<td>
					<?php
						if($notmatch_pass==1){
							echo "Passwords do not match";
						}
					?>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Change Password" />
				</td>
			</tr>
		</table>		
	</form>
	<p class="last_paragraph">
        <a href="index.php?action=list_tasks">View Task List</a>
    </p>

<?php include '../view/footer.php'; ?>