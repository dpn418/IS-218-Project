

<?php
    class LoginController{
        public function home() { //login page
            //echo "pages:" .$_SESSION['username'].$_SESSION['password'];
?>
<main>
            <?php
                global $root;
                require_once "view/login.php";
                require_once "view/registration.php"; ?>
</main>
            <?php require_once "view/footer.php"; ?>
<?php
        }
        public function task(){
            global $root;
            header("Location: product_manager/index.php");
        }

        public function error(){
            global $root;

            require_once("view/error.php");
        }
        public function home2() { //login page ?>
            <main>
                <?php
                global $root;
                ?>
            </main>
            <?php include "view/footer.php"; ?>
            <?php
        }
    }


?>