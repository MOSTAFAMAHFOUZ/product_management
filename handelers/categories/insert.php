<?php 
require_once '../../app/config.php';
getFile(HANDELER_FOLDER."database");
getFile(HANDELER_FOLDER."sessions");
getFile(HANDELER_FOLDER."validation");


if(isset($_POST['name']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    $name = val_sanitize($_POST['name']);

    // validations 
    if(!val_required($name)){
        $errors[] = "this field required";
    }elseif(!val_string($name)){
        $errors[] = "this field must be a string";
    }
    elseif(!val_min($name,3)){
        $errors[] = "this field must be grater than 3 chars";
    }
    elseif(!val_max($name,30)){
        $errors[] = "this field must be smaller than 30 chars";
    }



    if(empty($errors)){
        $sql = "INSERT INTO categories(`name`) VALUES('$name')";
        if(db_insert($sql)){
            setSession("success","added success");
            redirect("categories/index");
        }
    }else{
        setSession('errors',$errors);
        // var_dump(getSession('errors'));
        redirect("categories/add");
    }


}

