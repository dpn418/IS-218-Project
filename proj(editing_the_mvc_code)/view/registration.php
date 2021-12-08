<?php?>


<div class="login">

    <form action="/action_page.php" style="border:1px solid #ccc">
        <div class="container">
            <h1>Sign Up</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <div class="form-element">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="Username" pattern="" required> <br>
            </div>
            <div class="form-element">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required> <br>
            </div>

            <div class="form-element">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required> <br>
            </div>
            <div class="form-element">
            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required> <br>
            </div>
            <div class="form-element">
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
            </div>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>