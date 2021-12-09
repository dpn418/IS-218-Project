<?php?>


<div class="login">
    <form id="registrationForm" action="model/connectR.php" method="post" style="border:1px solid #ccc">
        <div class="container">
            <div class="header">
                <h1>Sign Up</h1>
            </div>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <div class="form-control">
                <label for="usernameR"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" id="usernameR" name="usernameR"  required>
                <small></small>
            </div>
            <div class="form-control">
                <label for="emailR"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" id="emailR" name="emailR" required>
                <small></small>
            </div>

            <div class="form-control">
                <label for="passwordR"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" id="passwordR" name="passwordR" required>
                <small></small>
            </div>
            <div class="form-control">
                <label for="passwordRepeatR"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="passwordRepeatR" id="passwordRepeatR" required>
                <small></small>
            </div>

            <div class="form-control">
                <label for="fName"><b>First Name</b></label>
                <input type="text" placeholder="Enter FirstName" id="fName" name="fName" required>
                <small></small>
            </div>

            <div class="form-control">
                <label for="lName"><b>Last Name</b></label>
                <input type="text" placeholder="Enter FirstName" id="lName" name="lName" required>
                <small></small>
            </div>

            <div class="form-control">
                Remember me <input type="checkbox" checked="checked" name="remember" id ="remember" style="margin-bottom:15px">
            </div>

            <div class="clearfix">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>