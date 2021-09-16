<?php 
require_once '../../app/config.php';
getFile(HANDELER_FOLDER."database");
getFile(HANDELER_FOLDER."sessions");
getFile(HANDELER_FOLDER."validation");


if(isset($_POST['name']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    // sinitizing inputs 
    $name = val_sanitize($_POST['name']);
    $email = val_sanitize($_POST['email']);
    $password = val_sanitize($_POST['password']);
    

    // validations 
    // name
    if(!val_required($name)){
        $errors[] = "name is required";
    }elseif(!val_string($name)){
        $errors[] = "name must be a string";
    }
    elseif(!val_min($name,3)){
        $errors[] = "name must be grater than 3 chars";
    }
    elseif(!val_max($name,30)){
        $errors[] = "name must be smaller than 30 chars";
    }

    // email 
    if(!val_required($email)){
        $errors[] = "email is required";
    }elseif(!val_email($email)){
        $errors[] = "email must be an email";
    }


    // password
    if(!val_required($password)){
        $errors[] = " password is required";
    }elseif(!val_string($password)){
        $errors[] = " password must be a string";
    }
    elseif(!val_min($password,6)){
        $errors[] = " password must be grater than 6 chars";
    }
    elseif(!val_max($password,30)){
        $errors[] = " password must be smaller than 30 chars";
    }




    if(empty($errors)){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(`name`,`email`,`password`) VALUES('$name','$email','$password')";
        if(db_insert($sql)){
            setSession("success","added success");
            redirect("users/index");
        }
    }else{
        // set old values in session 
        setSession('name',$name);
        setSession('email',$email);
        // define errors
        setSession('errors',$errors);
        redirect("users/add");
    }


}

