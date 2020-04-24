<?php

function is_user_loggedIn(){

    if($_SESSION['loggedIn'] && !empty($_SESSION['loggleIn'])){
        return true;
    }
      return false;
}

function is_token_set(){

    
        return is_token_set_in_get() || is_token_set_in_session();
    
}
function is_token_set_in_session(){

    
        return  isset($_SESSION['token']);
    
}
function is_token_set_in_get(){

    
        return isset($_GET['token']);
    
}

function find_user($email = ""){
    if(!$email){
        Set_alert('error','user Email is not set');
    }
    $allUsers = scandir("db/users/");
    $countAllUsers = count($allUsers); 

    for($counter = 0; $counter < $countAllUsers; $counter++){
        $currentUser = $allUsers[$counter];

        if($currentUser == $email. " . json"){
            $userstring = file_get_contents("db/users/".$currentUser);
        $userObject = json_decode($userstring);
          return $userObject;
         
             }
    }
    return false;
}

function save_user(){
    file_put_contents("db/users/". $email . ". json",json_encode($userObject));
}
