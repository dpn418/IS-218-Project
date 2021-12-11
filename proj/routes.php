<?php
    function call($controller, $action){

        require_once("controllers/".$controller."_controller.php");

        switch ($controller){
            //where to add cases to move to other pages
            //add a new case (if more controller aside from pages)
            case 'pages': //login page
                $controller = new LoginController();
                break;
            case 'post':
                $controller = new PostController();
            break;
        }

        $controller->{ $action}(); //calls upon the controller function by the name of the action

    }

    //controllers and its actions
    //to add more locations we need to add more pages
    $controllers = array('pages' => ['home','task'], 'post' =>['list_tasks','lists','check']);
    //echo "$controller";
    //echo "$action";

    if(array_key_exists($controller, $controllers)){
        if(in_array($action, $controllers[$controller])){
            call($controller, $action);
        }else {
            call('pages', 'error');
        }
    }else {
        call('pages', 'error');
    }


?>