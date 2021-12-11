<?php
class PostController{
    public function list_tasks(){
        global $root;
        //echo "post: ". $_SESSION['username'] . $_SESSION['password'];
        $this->test('h');
        //
    }
    public function lists(){
        $this->test('');
    }
    public function check(){
    }

    private function test($type){
        switch ($type){
            case 'h':
                header("Location: product_manager/index.php");
                break;
            case 'i':
                global $root;
                include "product_manager/index.php";
                break;
            case 'r':
                global $root;
                require_once "product_manager/index.php";
                break;
            default:
                break;
        }
    }
}