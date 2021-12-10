<?php
/*
//if user is already logged in take them to list of todos
if(array_key_exists('email', $_SESSION)){
    header('Location: ./taskView.php');
}
*/
?>


<div class="login">
    <form id="loginForm" action="model/connect.php" method="post" style="border:1px solid #ccc">
        <div class="container">
            <div class="header">
                <h1 style="color:#56b256">Login</h1>
            </div>
            <hr>
            <div class="form-control">
                <small><?php echo $_SESSION['errors']?></small> <br>
                <label for="username">Username (can be email)</label>
                <input type="text" id="username" name="username"  required />
                <small></small>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
                <small></small>
            </div>
            <input type="submit" name='submitButton' value="Login">
        </div>
    </form>
</div>

<?php $_SESSION['errors']="";?> <!--reset error after using it-->
