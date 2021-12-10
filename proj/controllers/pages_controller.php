

<?php
    class LoginController{
        public function home() { //login page ?>
<main>
            <?php
                global $root;
                include "$root/view/login.php";
                include "$root/view/registration.php"; ?>
</main>
            <?php include "$root/view/footer.php"; ?>
<?php
        }
        public function task(){
            global $root;
            require_once("$root/product_manager/index.php");
        }

        public function error(){
            global $root;

            require_once("$root/view/error.php");
        }
    }


?>