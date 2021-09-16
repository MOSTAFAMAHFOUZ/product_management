<?php 
require_once '../../app/config.php';
getFile(HANDELER_FOLDER."database");
getFile(HANDELER_FOLDER."sessions");
getFile(HANDELER_FOLDER."validation");


// check if id was sent throgh url ( get method )
if(isset($_POST['id']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    // sanitize the id 
    $id = filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $row = db_get_row("SELECT * FROM `users` WHERE `id`='$id' ");

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


    if(!empty($password)){
        // password
        if(!val_string($password)){
            $errors[] = " password must be a string";
        }
        elseif(!val_min($password,6)){
            $errors[] = " password must be grater than 6 chars";
        }
        elseif(!val_max($password,30)){
            $errors[] = " password must be smaller than 30 chars";
        }

        $password = password_hash($password,PASSWORD_DEFAULT);
    }else{
        $password = $row['password'];
    }
    

    // check from errors
    if(empty($errors)){
        // die("asdfasdfasdf");
        $sql = "UPDATE users SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`='$id'";
        if(db_update($sql)){
            setSession("success","updated success");
            redirect("users/index");
        }
    }else{

        // define errors
        setSession('errors',$errors);
        redirect("users/edit.php?id=".$id);
    }


}

