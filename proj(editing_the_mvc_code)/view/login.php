<?php?>

<div class="login">
    <form id="loginForm" action="index.php" method="POST" style="border:1px solid #ccc">
        <div class="container">
            <h1 style="color:#56b256">Login</h1>
            <hr>
            <div class="form-element">
                <label>Username</label>
                <input type="text" name="username"  required />
            </div>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div>
            <button type="submit" name="login" value="login" ">Log In</button>
        </div>
    </form>
    <div id="error"></div>
</div>