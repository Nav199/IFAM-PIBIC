<?php
require_once __DIR__ . "/../controller/UserController.php";

header("Content-Type: application/json");

$body = json_decode(file_get_contents('php://input'));

$userController = new UserController();


function checkBody($bodyObject, array $requiredParams) {
    for($i = 0; $i < count($requiredParams); $i++){
        if(!isset($bodyObject->{$requiredParams[$i]})){
            return True;
        }
    }
    return False;
}


