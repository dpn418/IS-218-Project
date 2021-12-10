

<?php
    class LoginController{
        public function home() { //login page
            echo "pages:" .$_SESSION['username'].$_SESSION['password'];
?>
<main>
            <?php
                global $root;
                require_once "$root/view/login.php";
                require_once "$root/view/registration.php"; ?>
</main>
            <?php require_once "$root/view/footer.php"; ?>
<?php
        }
        public function task(){
            global $root;
            header("Location: $root/product_manager/index.php");
        }

        public function error(){
            global $root;

            require_once("$root/view/error.php");
        }
        public function home2() { //login page ?>
            <main>
                <?php
                global $root;
                ?>
            </main>
            <?php include "$root/view/footer.php"; ?>
            <?php
        }
    }


?>