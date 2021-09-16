<?php 
require_once '../app/config.php';

getFile(PREV_FOLDER."app/database");
getFile(PREV_FOLDER."app/validation");
getFile(PREV_FOLDER."app/sessions");


if(isset($_POST['email']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    // sinitizing inputs 
    $email = val_sanitize($_POST['email']);
    $password = val_sanitize($_POST['password']);
    

    // validations 


    // email 
    if(!val_required($email)){
        $errors[] = "email is required";
    }elseif(!val_email($email)){
        $errors[] = "email must be an email";
    }


    // password
    if(!val_required($password)){
        $errors[] = " password is required";
    }




    if(empty($errors)){
        // check if user is exist or not 
        $row = db_get_row("SELECT * FROM `users` WHERE `email`='$email' ");
        if($row){
            // die($row['password']);
            $check_password = password_verify($password,$row['password']);
            if($check_password){
                setSession('user',[
                    'user_name'=>$row['name'],
                    'user_email'=>$row['email'],
                    'user_type'=>$row['type'],
                ]);
                redirect("index");
            }else{
            setSession('errors',['email or passsword not correct']);
            }
        }else{
            setSession('errors',['email or passsword not correct']);
        }
    }else{
        // define errors
        setSession('errors',$errors);
    }
    redirect("login");


}




