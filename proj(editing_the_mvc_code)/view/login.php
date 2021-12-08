<?php
	//if user is already logged in take them to list of todos
	if(array_key_exists('email', $_SESSION)){
		header('Location: ./taskView.php');
	}

?>

<div class="login">
    <form id="loginForm" action="/" style="border:1px solid #ccc">
        <div class="container">
            <div class="header">
                <h1 style="color:#56b256">Login</h1>
            </div>
            <hr>
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"  required />
                <small></small>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
                <small></small>
            </div>
            <button type="submit">Log In</button>
        </div>
    </form>
</div>